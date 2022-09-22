<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
//        if($request->method()=='GET')
//        {
//            return view('category.create-category', compact('categories'));
//        }
//        if($request->method()=='POST')
//        {
//            $validator = $request->validate([
//                'name'      => 'required',
//                'slug'      => 'required|unique:categories',
//                'parent_id' => 'nullable|numeric'
//            ]);
//
//            Category::create([
//                'name' => $request->name,
//                'slug' => $request->slug,
//                'parent_id' =>$request->parent_id
//            ]);
//
//            return redirect()->back()->with('success', 'Category has been created successfully.');
//        }

        $Categorys = Category::all();



        return view('courses.new.categoris', ['Categorys' => $Categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$Categorys = Category::all();
        return view('courses.new.create-categories', ['Categories' => $Categorys]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
    return view('category.all-category', compact('categories'));
   }

    public function editCategory($id, Request $request)
    {
//        $category = Category::findOrFail($id);
//        if($request->method()=='GET')
//        {
//            $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
//            return view('category.edit-category', compact('category', 'categories'));
//        }
//
//        if($request->method()=='POST')
//        {
//            $validator = $request->validate([
//                'name'     => 'required',
//                'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
//                'parent_id'=> 'nullable|numeric'
//            ]);
//            if($request->name != $category->name || $request->parent_id != $category->parent_id)
//            {
//                if(isset($request->parent_id))
//                {
//                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', $request->parent_id)->first();
//                    if($checkDuplicate)
//                    {
//                        return redirect()->back()->with('error', 'Category already exist in this parent.');
//                    }
//                }
//                else
//                {
//                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', null)->first();
//                    if($checkDuplicate)
//                    {
//                        return redirect()->back()->with('error', 'Category already exist with this name.');
//                    }
//                }
//            }
//
//            $category->name = $request->name;
//            $category->parent_id = $request->parent_id;
//            $category->slug = $request->slug;
//            $category->save();
//            return redirect()->back()->with('success', 'Category has been updated successfully.');
//        }
    }
    public function deleteCategory($id)
{
//    $category = Category::findOrFail($id);
//    if(count($category->subcategory))
//    {
//        $subcategories = $category->subcategory;
//        foreach($subcategories as $cat)
//        {
//            $cat = Category::findOrFail($cat->id);
//            $cat->parent_id = null;
//            $cat->save();
//        }
//    }
//    $category->delete();
//    return redirect()->back()->with('delete', 'Category has been deleted successfully.');
}
//}
//
//if($request->has('parent_id')){
//
//Sub_Category::create([
//    "name" => $request->name,
//    "category_id" => $request->parent_id
//]);
//
//}
//else{
//    Category::create(["name" => $request->name]);
//}
//
//
//        return redirect()->route('allCategories');
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::find($id);
        return view('Category.show', ['Category' => $Category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('Category.edit', ['Category' => $Category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('Categorys',)->with('message', 'Category deleted successfully');
    }

}

