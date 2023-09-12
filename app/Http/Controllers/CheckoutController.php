<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {

        $validated = $request->validate([
            'price' => 'required',
            'project_id' => 'required',
        ]);

        $secretKey = env('STRIPE_SECRET_KEY');

        \Stripe\Stripe::setApiKey('sk_test_51MBdoJIMzWwDJnIZpZWnQUOQTiMB10sdehnKH1xOjkej9xGpiPYUD723mRqq0HTyXZ5oaWbfihOoyQrNs3TmL3zu00G0qbIO5l');

        $lineItems = [

               [
                   'price_data' => [
                       'currency' => 'eur',
                       'unit_amount' => $validated['price'] * 100,
                       'product_data' => [
                           'name' => $request->title,
                           'images' => [$request->image],
                       ],
                   ],
                   'quantity' => 1,
            ]
        ];


        $checkoutSession = \Stripe\Checkout\Session::create([
            'mode' => 'payment',
            'success_url' => route('checkout.success') . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => url()->previous(),
            'line_items' => $lineItems,
            'submit_type' => 'donate',
        ]);


        $order = new Order();
        $order -> status = 'unpaid';
        $order -> total_price = $validated['price'];
        $order -> project_id = $validated['project_id'];
        $order -> session_id = $checkoutSession->id;

        $order->save();

        return redirect($checkoutSession->url);

    }

    public function success(Request $request) {



        $secretKey = env('STRIPE_SECRET_KEY');

        \Stripe\Stripe::setApiKey('sk_test_51MBdoJIMzWwDJnIZpZWnQUOQTiMB10sdehnKH1xOjkej9xGpiPYUD723mRqq0HTyXZ5oaWbfihOoyQrNs3TmL3zu00G0qbIO5l');

        $sessionId = $request->get('session_id');

        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        $customerDetails = [
            'email' => $session['customer_details']['email'],
            'name' => $session['customer_details']['name']
        ];


        try {



            if(!$session) {
                throw new NotFoundHttpException();
            }

            $order = Order::where('session_id',$session->id)->where('status','unpaid')->first();

            if(!$order) {
                throw new NotFoundHttpException();
            }

            $order->full_name = $customerDetails['name'];
            $order->email = $customerDetails['email'];

            $order->status = 'paid';
            $order->save();


            $project = Order::where('session_id',$request->get('session_id'))->first()->project;


            $percentage = ($project->orders->where('status', 'paid')->sum('total_price') * 100) / $project->price;

            if($percentage >= 100) {
                $project->status = 'completed';
                $project->save();
            }

            return view('success');

        }catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

    }
}
