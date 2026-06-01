<div style="font-family: sans-serif; color: #333; max-width: 600px; margin: 0 auto;">
    <h1 style="color: #6a1b9a;">¡Gracias por tu compra, {{ $order->user->name }}!</h1>

    <p>Hemos recibido tu pedido <strong>#{{ $order->id }}</strong> correctamente. Te avisaremos por correo en cuanto cambie de estado.</p>

    <div style="background: #f3e5f5; padding: 15px; border-radius: 8px; font-size: 1.1em; text-align: center; margin: 20px 0;">
        <strong>ESTADO ACTUAL: PENDIENTE</strong>
    </div>

    <h3 style="color: #6a1b9a; margin-top: 30px;">Detalles del pedido</h3>
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background: #6a1b9a; color: white;">
                <th style="padding: 8px; text-align: left;">Producto</th>
                <th style="padding: 8px; text-align: center;">Cantidad</th>
                <th style="padding: 8px; text-align: right;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;">{{ $item->product->name }}</td>
                    <td style="padding: 8px; text-align: center;">{{ $item->quantity }}</td>
                    <td style="padding: 8px; text-align: right;">{{ number_format($item->price, 2) }} €</td>
                </tr>
            @endforeach
            <tr style="background: #f3e5f5; font-weight: bold;">
                <td style="padding: 8px;" colspan="2">Total</td>
                <td style="padding: 8px; text-align: right;">{{ number_format($order->total, 2) }} €</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 30px;">Si tienes cualquier duda, simplemente responde a este correo.</p>
    <p>¡Gracias por confiar en <strong>Amatist TCG</strong>! El poder está en tus manos.</p>
</div>
