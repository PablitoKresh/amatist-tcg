<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
// --- ESTAS SON LAS DOS LÍNEAS NUEVAS QUE HE AÑADIDO ---
use App\Mail\PedidoPreparando;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function comprar($id)
    {
        $producto = Product::findOrFail($id);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $producto->price,
            'status' => 'pendiente'
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $producto->id,
            'quantity' => 1,
            'price' => $producto->price
        ]);

        return back()->with('success', 'Compra realizada');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pendiente,preparando,enviado,entregado,cancelado',
        ]);

        $order->update(['status' => $request->status]);

        // --- LÓGICA PARA EL ENVÍO DE EMAIL ---
        if ($order->status === 'preparando') {
            // Enviamos el correo al email del usuario dueño del pedido
            Mail::to($order->user->email)->send(new PedidoPreparando($order));
        }

        return back()->with('success', "Pedido #{$order->id} actualizado a '{$order->status}'");
    }
}
