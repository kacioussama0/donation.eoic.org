<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
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


    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $categoriesEN = Category::latest()->where('title_en','<>' , null)->paginate(5);
        $categoriesFR = Category::latest()->where('title_fr', '<>' , null)->paginate(5);
        return view('admin.categories.index',compact('categories','categoriesEN','categoriesFR'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3|max:40|unique:categories,title',
            'title_en' => 'required|min:3|max:40|unique:categories,title_en',
            'title_fr' => 'required|min:3|max:40|unique:categories,title_fr',
            'icon' => 'required|mimes:jpg,bmp,png,svg',
        ]);

        $image = $request->file('icon')->store('categories/icon','public');




        $category = Category::create([
            'title'=> $request -> title,
            'title_en'=> $request -> title_en,
            'title_fr'=> $request -> title_fr,
            'slug' => $this->slug($request -> title),
            'slug_en' => Str::slug($request -> title_en),
            'slug_fr' => Str::slug($request -> title_fr),
            'icon' => $image
        ]);

        if($category) {
            return redirect()->to('admin/categories')->with([
                'success'=> __('forms.add-success')
            ]);
        }

        return abort(500);

    }

    public function show(Category $category)
    {
        return redirect()->to('category/'. $category -> title());
    }


    public function edit(Category $category) {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request , Category $category) {

        $request->validate([
            'title' => 'required|min:3|max:40|unique:categories,title,' . $category->id,
            'title_en' => 'required|min:3|max:40|unique:categories,title_en,' . $category->id,
            'title_fr' => 'required|min:3|max:40|unique:categories,title_fr,' . $category->id,
        ]);

        $image = '';

        if($request->hasFile('icon')) {
            Storage::delete('public/' . $category->icon);
            $image = $request->file('icon')->store('categories/icon','public');
        }

        $category = $category->update([
            'title'=> $request -> title,
            'title_en'=> $request -> title_en,
            'title_fr'=> $request -> title_fr,
            'slug' => $this->slug($request -> title),
            'slug_en' => Str::slug($request -> title_en),
            'slug_fr' => Str::slug($request -> title_fr),
            'icon' => $image ? $image : $category->icon
        ]);

        if($category) {
            return redirect()->to('admin/categories')->with([
                'success'=> __('forms.edit-success')
            ]);
        }


        return abort(500);

    }




    public function destroy(Category $category)
    {

        if(!empty($category->projects)) {
            return  abort(401);
        }

        if($category -> delete()) {
            Storage::delete('public/' . $category->icon);
        }

        return redirect()->back()->with([
            'success'=> __('forms.deleted-success')
        ]);

    }
}
