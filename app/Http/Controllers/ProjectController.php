<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Image;

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

        if(empty($categories)) {
            return redirect()->route('categories.index');
        }



        return view('admin.projects.create',compact('categories'));
    }


    public function store(Request $request)
    {
        // Start Project Validation

        $request->validate([

            'title' => 'required|min:5|max:255|unique:projects',
            'category' => 'required',
            'description' => 'required|min:20',

            'thumbnail'=> [
                'required',
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],

        ]);


        $image = $request->file('thumbnail')->store('projects/thumbnail','public');


        $Project = Category::find($request->category)->projects()->create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'slug' => $this->slug($request->title),
            'slug_en' => Str::words(Str::slug($request->title_en,'-'),5),
            'slug_fr' => Str::words(Str::slug($request->title_fr,'-'),5),
            'category_id' => $request->category,
            'description' => $request['description'],
            'description_fr' => $request['content_fr'],
            'description_en' => $request['description_en'],
            'created_at' => $request -> created_at,
            'status' => $request->status,
            'thumbnail' => $image,
            'price' => $request->price,
            'visitors' => 0

        ]);

        // End Store Project To Database


        return redirect()->to('admin/projects')->with([
            'success' =>  __('forms.add-success')
        ]);

    }


    public function show(Project $Project)
    {
        return redirect()->to('projects/' . $Project->slug());
    }

    public function edit(Project $Project)
    {

        $categories = Category::all();
        return view('admin.projects.edit',compact('categories','Project'));

    }

    public function update(Request $request, Project $Project)
    {
        // Start Project Validation

        $request->validate([

            'title' => 'required|min:5|max:255|unique:projects,title,' . $Project->id,
            'category' => 'required',
            'content' => 'required|min:20',

            'image'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_en'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ],
            'image_fr'=> [
                File::types([
                    'jpg','gif','png','webp','svg'
                ])->max(1024 * 5)
            ]
        ]);

        // End Project Validation


        // Start Image Upload

        $image = $imageFR = $imageEN = '';

        if(!empty($request->file('image'))) {

            if(Storage::exists(public_path("storage/" . $Project->image))) {
                unlink(public_path("storage/" . $Project->image));
            }

            $image = $request->file('image')->store('projects/ar/','public');

            if($Project -> image == $Project -> image_en) {
                $imageEN = $image;
            }

            if($Project -> image == $Project -> image_fr) {
                $imageFR = $image;
            }

        }

        if(!empty($request->file('image_en'))) {

            if($Project -> image_en != $Project -> image) {
                unlink(public_path("storage/" . $Project->image_en));
            }
            $imageEN = $request->file('image_en')->store('projects/en/','public');
        }

        if(!empty($request->file('image_fr'))) {

            if($Project -> image_fr != $Project -> image) {
                unlink(public_path("storage/" . $Project->image_fr));
            }

            $imageFR = $request->file('image_fr')->store('projects/fr/','public');
        }

        // End Image Upload

        // Start Update Project To Database


        $Project->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'slug' => Str::words($this->slug($request->title,'-'),5),
            'slug_en' => Str::words($this->slug($request->title_en,'-'),5),
            'slug_fr' => Str::words($this->slug($request->title_fr,'-'),5),
            'category_id' => $request->category,
            'description' => $request['description'],
            'description_fr' => $request['description_fr'],
            'description_en' => $request['description_en'],
            'created_at' => $request -> created_at,
            'is_published' => ($request->is_published == null) ? null : 'on' ,
            'thumbnail' => $image ? $image : $Project -> image,

        ]);

        // End Update Project To Database


        $Project -> tags()->sync($request->tags);



        return redirect()->to('admin/projects')->with(
            [
                'success' =>  __('forms.edit-success')
            ]
        );

    }



    public function junk()
    {

        $trashedprojects = Project::onlyTrashed()->paginate(6);
        return view('admin.projects.trashed',compact('trashedprojects'));
    }


    public function restoredTrashed($id)
    {

        $Project = Project::withTrashed()->where('id',$id)->first();

        $Project -> restore();


        return redirect()->to('admin/projects')->with(
            ['success' => __('forms.restore-success')]
        );
    }


    public function deleteTrashed($id)
    {

        $Project = Project::withTrashed()->where('id',$id)->first();


        if(Storage::exists(public_path("storage/" . $Project->image))) {
            unlink(public_path("storage/" . $Project->image));
        }

        if(Storage::exists(public_path("storage/" . $Project->image_en))) {
            unlink(public_path("storage/" . $Project->image_en));
        }

        if(Storage::exists(public_path("storage/" . $Project->image_fr))) {
            unlink(public_path("storage/" . $Project->image_fr));
        }


        $Project -> forceDelete();

        return redirect()->back()->with([
            'success' => __('forms.deleted-success')
        ]);
    }


    public function destroy(Project $Project)
    {
        $Project -> delete();
        return redirect()->back()->with([
            'success' => __('forms.deleted-success')
        ]);
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
