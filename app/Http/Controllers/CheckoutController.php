<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {




        $validated = $request->validate([
            'price' => 'required|min:1',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);


        $campaign = Campaign::find($request->campaign_id);


        if ($campaign->collected_amount >= $campaign->target_amount) {
            return back()->with('error', 'هذه الحملة مكتملة ولا تستقبل تبرعات جديدة.');
        }

        $secretKey = env('STRIPE_SECRET_KEY');

        $stripe = new \Stripe\StripeClient($secretKey);


        $lineItems = [

               [
                   'price_data' => [
                       'currency' => 'eur',
                       'unit_amount' => $validated['price'] * 100,
                       'product_data' => [
                           'name' => $request->title,
                           'description' => $request->description,
                           'images' => [$request->image],
                       ],
                   ],
                   'quantity' => 1,
            ]
        ];


        try {

            $checkoutSession = $stripe->checkout->sessions->create([
                'mode' => 'payment',
                'success_url' => route('checkout.success') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('campaign.show', $campaign->slug),
                'line_items' => $lineItems,
                'submit_type' => 'donate',
            ]);


            $order = new Donation();
            $order->status = 'pending';
            $order->amount = $validated['price'];
            $order->campaign_id = $validated['campaign_id'];
            $order->stripe_checkout_session_id = $checkoutSession->id;

            $order->save();

            return redirect($checkoutSession->url);
        } catch (\Exception $e) {

            return redirect()
                ->route('campaign.show', $campaign->slug)
                ->with('stripe_error', 'حدث خطأ أثناء معالجة الدفع، يرجى المحاولة مرة أخرى.');
        }
    }

    public function success(Request $request) {



        $secretKey = env('STRIPE_SECRET_KEY');

        $stripe = new \Stripe\StripeClient('sk_test_51MBdoJIMzWwDJnIZpZWnQUOQTiMB10sdehnKH1xOjkej9xGpiPYUD723mRqq0HTyXZ5oaWbfihOoyQrNs3TmL3zu00G0qbIO5l');

        $sessionId = $request->get('session_id');

        $session = $stripe->checkout->sessions->retrieve($sessionId);



        $customerDetails = [
            'email' => $session['customer_details']['email'],
            'name' => $session['customer_details']['name']
        ];


        try {



            if(!$session) {
                throw new NotFoundHttpException();
            }

            $order = Donation::where('stripe_checkout_session_id',$session->id)->first();

            if(!$order) {
                throw new NotFoundHttpException();
            }

            $order->donor_name = $customerDetails['name'];
            $order->donor_email = $customerDetails['email'];


            if($session['payment_status'] == 'paid')  {
                $order->status = 'paid';
                $order->save();

                $campaign = Campaign::find($order->campaign_id);

                $campaign->collected_amount = $campaign->collected_amount + $order->amount;

                $campaign->save();

                return view('success',compact('order'));

            }

            abort(500);


        }catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

    }
}
