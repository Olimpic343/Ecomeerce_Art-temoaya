<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use App\Models\Payment;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function checkout(Request $request){
        Stripe::setApiKey(config('services.stripe.secret'));
        $request->validate([
            'user_address_id' => 'required|exists:shipping_addresses,id',
        ]);


        $cart = Cart::where('user_id',auth()->id())->with('product')->get();

        if($cart->isEmpty()){
            return redirect()->back()->with('error','Tu carrito está vacío');
        }

         // Guardamos la dirección en sesión para usarla después
        session(['user_address_id' => $request->user_address_id]);


        $lineItems = [];

        foreach ($cart as $item) {
            $lineItems[] =[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => intval($item->price * 100),
                ],
                'quantity' => $item->quantity,
            ];
        }

        // Agregar envío como ítem adicional
        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => ['name' => 'Envío'],
                'unit_amount' => 690, // 6.90 USD en centavos
            ],
            'quantity' => 1,
        ];

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel')
        ]);

        session(['stripe_session_id' => $session->id]);

        return redirect($session->url);
    }





    public function success(){

         $user = auth()->user();
         Log::info('Iniciando success() para el usuario id:'.$user->id);


        $cart = Cart::where('user_id', $user->id)->with('product')->get();
         Log::info('items en el carrito:'.$cart->count());


        $addressId = session('user_address_id');
        Log::info('Direccion seleccionada ID:'.$addressId);

        if (!$addressId || $cart->isEmpty()) {
            Log::warning('Direccion no encontrada o carrito vacio');
            return redirect()->route('home')->with('error', 'No se pudo procesar el pedido.');
        }

        $shippingCost = 6.90;
        $subTotal = $cart->sum(fn($item) => $item->price * $item->quantity);
        $total = $subTotal + $shippingCost;

        Log::info("subtotal:$subTotal| Envio: $shippingCost | Total: $total");

      DB::beginTransaction();


      try {

        $order = Order::create([
            'user_id' => $user->id,
            'user_address_id' => $addressId,
            'total_price' => $total,
            'status' => 'paid',
        ]);

        Log::info('orden creada con ID'.$order->id);

        foreach ($cart as $item){

               OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->price * $item->quantity,
               ]);

               Log::info("+ producto agregado: {$item->product->name} x {$item->quantity}");
        }




        Cart::where('user_id', $user->id)->delete();
        Log::info('Carrito vaciado');

        DB::commit();
        session()->forget('user_address_id');
        Log::info('Pedido finalizado correctamente');

   // 1. Recuperar el session_id
            $stripeSessionId = session('stripe_session_id');
            if (!$stripeSessionId) {
                throw new \Exception('No se encontró el Stripe Session ID en sesión.');
            }

            // 2. Obtener la sesión de Stripe
            Stripe::setApiKey(config('services.stripe.secret'));
            $stripeSession = StripeSession::retrieve($stripeSessionId);

            // 3. Obtener detalles del pago (payment intent)
            $paymentIntent = PaymentIntent::retrieve($stripeSession->payment_intent);

            // 4. Crear el registro en payments
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'stripe',
                'amount' => ($paymentIntent->amount_received / 100), // Stripe usa centavos
                'transaction_id' => $paymentIntent->id,
                'transaction_json' => json_encode($paymentIntent->toArray()),
                'status' => $paymentIntent->status === 'succeeded' ? 'completed' : 'failed',
            ]);

            Log::info('💳 Pago registrado con éxito: ' . $paymentIntent->id);

         Mail::to($user->email)->send(new OrderConfirmationMail($order));
            Log::info('📧 Correo de confirmación enviado a ' . $user->email);


        return view('cart.success', compact('order'));

      } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error al guardar el pedido:'.$e->getMessage());
        return redirect()->route('checkout.cancel')->with ('error','Error al registrar el pedido.');
      }



    }








    public function cancel(){
        return view('cart.cancel');
    }

}

