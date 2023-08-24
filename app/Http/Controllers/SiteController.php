<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
class SiteController extends Controller
{

    public function home() {
        $orders = Order::where('status','paid')->count();
        $visitors = Project::sum('visitors');
        $projects = Project::latest()->get();
        $categories = Category::latest()->get();

        if(config('app.locale') == 'fr') {
            $projects = Project::where('title_fr', '!=' , null)->get();
        }

        elseif(config('app.locale') == 'en') {
            $projects = Project::where('title_en', '!=' , null)->get();
        }



        return view('welcome',compact('orders','visitors','projects','categories'));
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


    public function projects() {
        $title = 'المشاريع';
        $categories = Category::latest()->get();
        $projects = Project::where('status','open')->latest()->get();

        if(config('app.locale') == 'fr') {
            $projects = Project::where('title_fr', '!=' , null)->where('status','open')->get();
        }

        elseif(config('app.locale') == 'en') {
            $projects = Project::where('title_en', '!=' , null)->where('status','open')->get();
        }

        return view('projects',compact('categories','projects','title'));
    }


    public function completedProject() {
        $title = 'المشاريع المكتملة';
        $categories = Category::latest()->get();
        $projects = Project::where('status','completed')->latest()->get();
        return view('projects',compact('categories','projects','title'));
    }

    public function project($slug) {

        $project = Project::where('slug', $slug)->first();

        if(config('app.locale') == 'fr') {
            $project = Project::where('slug_fr', $slug)->first();
        }

        elseif(config('app.locale') == 'en') {
            $project = Project::where('slug_en', $slug)->first();
        }

        $project -> visitors++;
        $project -> save();
        return view('project',compact('project'));
    }

    public function orders() {
        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index',compact('orders'));
    }

}
