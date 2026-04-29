<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

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

        return back()->with('success', "Pedido #{$order->id} actualizado a '{$order->status}'");
    }

    
}
