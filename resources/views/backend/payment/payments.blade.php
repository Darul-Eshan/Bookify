<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Checkout - {{ $order->event_title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0b14] text-white flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-[#121222] border border-gray-800 p-8 rounded-2xl shadow-2xl">
        <h2 class="text-2xl font-bold mb-4 text-purple-400">Payment Summary</h2>

        @if(session('error_message'))
            <div class="bg-red-500/20 text-red-400 p-3 rounded-lg mb-4 text-sm">
                {{ session('error_message') }}
            </div>
        @endif

        <div class="space-y-3 mb-6 text-gray-300">
            <p><strong>Event:</strong> {{ $order->event_title }}</p>
            <p><strong>Tickets:</strong> {{ $order->quantity }} Quantity</p>
            <p><strong>Total Amount:</strong> ${{ number_format($order->amount, 2) }}</p>
            <p><strong>User:</strong> {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
        </div>

        <form action="{{ route('user.payment.process') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <script
                src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{ $order->amount * 100 }}"
                data-name="{{ $order->event_title }}"
                data-description="Ticket Purchase"
                data-currency="usd"
                data-email="{{ Auth::user()->email }}">
            </script>
        </form>
    </div>
</body>
</html>