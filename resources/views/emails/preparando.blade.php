<div style="font-family: sans-serif; color: #333;">
    <h1 style="color: #6a1b9a;">¡Hola, {{ $order->user->name }}!</h1>
    <p>Tenemos buenas noticias. Tu pedido <strong>#{{ $order->id }}</strong> ha cambiado su estado a:</p>
    <div style="background: #f3e5f5; padding: 15px; border-radius: 8px; font-size: 1.2em; text-align: center;">
        <strong>PREPARANDO</strong>
    </div>
    <p>Nuestros duendes de las cartas ya están metiendo tus productos en el sobre. ¡Te avisaremos cuando salga!</p>
</div>