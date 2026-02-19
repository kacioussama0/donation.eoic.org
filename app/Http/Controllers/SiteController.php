<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
class SiteController extends Controller
{

    public function home() {


        $categories = Category::latest()->get();
        $campaigns = Campaign::latest()->get()->take(12);
        return view('welcome',compact('categories','campaigns'));

    }
    public function change_language($locale) {
        try {
            if(array_key_exists($locale,config('locale.languages'))) {
                App::setLocale($locale);
                Lang::setLocale($locale);
                Session::put('locale',$locale);
                Carbon::setLocale($locale);
            }
            return redirect()->to('/');
        }catch (\Exception $exception) {
            return redirect()->back();
        }
    }


    public function projects($slug) {


        $category = Category::where('slug',$slug)->first();

        $projects = $category -> projects;

        $title = $category->title;

        if(config('app.locale') == 'fr') {
            $projects = Project::where('title_fr', '!=' , null)->where('status','open')->get();
        }

        elseif(config('app.locale') == 'en') {
            $projects = Project::where('title_en', '!=' , null)->where('status','open')->get();
        }

        return view('projects',compact('projects','title','category'));
    }


    public function completedProject() {
        $title = 'المشاريع المكتملة';
        $categories = Category::latest()->get();
        $projects = Project::where('status','completed')->latest()->get();
        return view('projects',compact('categories','projects','title'));
    }

    public function campaign ($slug) {


        $campaign  = Campaign::where('slug', $slug)->first();
        $latestDonation = $campaign->donations->where('status','paid')->last();

        $cookieKey = "campaign_viewed_{$campaign->id}";

        if (!request()->cookie($cookieKey)) {
            $campaign->increment('visitors');
            Cookie::queue($cookieKey, true, 60 * 24);
        }


        return view('campaign',compact('campaign','latestDonation'));
    }

    public function orders() {
        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index',compact('orders'));
    }

    public function categories() {

        $categories = Category::latest()->get();

        return view('categories',compact('categories'));
    }

}
