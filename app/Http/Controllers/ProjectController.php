<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Facades\Image;


class ProjectController extends Controller
{

    public function slug($string, $separator = '-') {

        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }


    public function __construct() {

    }

    public function index()
    {
        $projects = Project::latest()->paginate(12);
        return view('admin.projects.index',compact('projects'));

    }

    public function create()
    {
        $categories = Category::all();

        if(!count($categories)) {
            return redirect()->route('categories.index');
        }

        return view('admin.projects.create',compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|min:5|max:255|unique:projects',
            'category' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'price_one' => 'required',
            'thumbnail'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 50)
            ],
        ]);

        $img = Image::make($request->file('thumbnail'))->resize('484','262');
        $img->insert('imgs/watermark.png','center');

        $image = $img->save('storage/projects/thumbnails/D' . uniqid() . '.jpg' );

        $Project = Category::find($request->category)->projects()->create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'slug' => $this->slug($request->title),
            'slug_en' => Str::words(Str::slug($request->title_en,'-'),5),
            'slug_fr' => Str::words(Str::slug($request->title_fr,'-'),5),
            'category_id' => $request->category,
            'description' => $request['description'],
            'description_fr' => $request['description_fr'],
            'description_en' => $request['description_en'],
            'created_at' => $request -> created_at,
            'status' => $request->status,
            'thumbnail' => 'projects/thumbnails/' . $image -> basename,
            'price' => $request->price,
            'price_one' => $request->price_one,
            'visitors' => 0
        ]);

        if($Project) {
            return redirect()->to('admin/projects')->with([
                'success' =>  __('forms.add-success')
            ]);
        }

        return abort(500);


    }


    public function show(Project $project)
    {
        return redirect()->to('projects/' . $project->slug());
    }

    public function edit(Project $project)
    {

        $categories = Category::all();
        return view('admin.projects.edit',compact('categories','project'));

    }

    public function update(Request $request, Project $Project)
    {
        $request->validate([

            'title' => 'required|min:5|max:255',
            'category' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'price_one' => 'required',
        ]);



        $image = '';

        if($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $Project->thumbnail);
            $img = Image::make($request->file('thumbnail'))->resize('484','262');
            $img->insert('imgs/watermark.png','center');
            $image = $img->save('storage/projects/thumbnails/D' . $Project -> id . '.jpg' );

        }



         $updated = $Project -> update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'slug' => $this->slug($request->title),
            'slug_en' => Str::words(Str::slug($request->title_en,'-'),5),
            'slug_fr' => Str::words(Str::slug($request->title_fr,'-'),5),
            'category_id' => $request->category,
            'description' => $request['description'],
            'description_fr' => $request['description_fr'],
            'description_en' => $request['description_en'],
            'created_at' => $request -> created_at,
            'status' => $request->status,
            'thumbnail' => $image ?  'projects/thumbnails/' . $image -> basename : $Project->thumbnail,
            'price' => $request->price,
            'price_one' => $request->price_one,
            'visitors' => $Project->visitors
        ]);

        if($Project) {
            return redirect()->to('admin/projects')->with([
                'success' =>  __('forms.edit-success')
            ]);
        }

        return abort(500);
    }




    public function destroy(Project $Project)
    {

        if($Project -> delete()) {
            Storage::delete('public/' . $Project->thumbnail);
            return redirect()->back()->with([
                'success' => __('forms.deleted-success')
            ]);
        }

        return  abort(500);
    }

    public function uploadImage(Request $request) {

        if($request -> hasFile('upload')) {
            $image = $request->file('upload')->store('projects/images','public');
            return response()->json(['filename' => $image , 'uploaded' => 1 , 'url' => asset('storage/' . $image)]);
        }

        return  "";

    }

    public function filtering(Request $request) {

        $projects = Project::where('title','like','%' . $request->title . '%')->paginate(12);

        return view('admin.projects.index',compact('projects'));

    }


}
