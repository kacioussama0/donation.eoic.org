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
        $projects = Project::count();

        return view('welcome',compact('orders','visitors','projects'));
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
        $project -> visitors++;
        $project -> save();
        return view('project',compact('project'));
    }

}
