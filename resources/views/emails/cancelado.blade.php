<div style="font-family: sans-serif; color: #333;">
    <h1 style="color: #6a1b9a;">¡Hola, {{ $order->user->name }}!</h1>
    <p>Tenemos malas noticias. Tu pedido <strong>#{{ $order->id }}</strong> ha cambiado su estado a:</p>
    <div style="background: #f3e5f5; padding: 15px; border-radius: 8px; font-size: 1.2em; text-align: center;">
        <strong>CANCELADO</strong>
    </div>
    <p>¡Esperemos que puedas comprar otros productos pronto!</p>
</div>