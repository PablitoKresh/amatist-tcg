<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\PedidoConfirmado;
use App\Mail\PedidoPreparando;
use App\Mail\PedidoEnviado;
use App\Mail\PedidoEntregado;
use App\Mail\PedidoCancelado;

class OrderController extends Controller
{
    /**
     * Realiza la compra de un producto: crea el pedido + línea de pedido,
     * descuenta stock dentro de una transacción y envía el email de
     * confirmación al usuario.
     */
    public function comprar($id)
    {
        $producto = Product::findOrFail($id);

        // Si no hay stock, no permitimos la compra
        if ($producto->stock <= 0) {
            return back()->with('error', 'Este producto está agotado.');
        }

        // Transacción: o se hace todo (order + item + decremento stock) o nada
        $order = DB::transaction(function () use ($producto) {

            $order = Order::create([
                'user_id' => auth()->id(),
                'total'   => $producto->price,
                'status'  => 'pendiente',
            ]);

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $producto->id,
                'quantity'   => 1,
                'price'      => $producto->price,
            ]);

            // Decrementamos el stock del producto
            $producto->decrement('stock');

            return $order;
        });

        // Envío del correo de confirmación de compra (Problema 2)
        // Se hace FUERA de la transacción: si el SMTP falla no queremos
        // revertir el pedido ya guardado en BD.
        try {
            Mail::to($order->user->email)->send(new PedidoConfirmado($order));
        } catch (\Throwable $e) {
            // El pedido ya está creado; solo logueamos el fallo del correo
            \Log::warning('No se pudo enviar el correo de confirmación: ' . $e->getMessage());
        }

        return back()->with('success', '¡Compra realizada! Te hemos enviado un correo con los detalles.');
    }

    /**
     * El administrador cambia el estado del pedido y se notifica
     * automáticamente al cliente con el email correspondiente.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pendiente,preparando,enviado,entregado,cancelado',
        ]);

        $order->update(['status' => $request->status]);

        // Mailable según el nuevo estado
        $mailables = [
            'preparando' => PedidoPreparando::class,
            'enviado'    => PedidoEnviado::class,
            'entregado'  => PedidoEntregado::class,
            'cancelado'  => PedidoCancelado::class,
        ];

        if (isset($mailables[$order->status])) {
            try {
                Mail::to($order->user->email)->send(new $mailables[$order->status]($order));
            } catch (\Throwable $e) {
                \Log::warning('No se pudo notificar al cliente: ' . $e->getMessage());
            }
        }

        return back()->with('success', "Pedido #{$order->id} actualizado a '{$order->status}'");
    }
}
