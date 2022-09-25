<?php


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;


//namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['permission:categories-read'])->only('index');
        $this->middleware(['permission:categories-create'])->only('create');
        $this->middleware(['permission:categories-update'])->only('edit');
        $this->middleware(['permission:categories-delete'])->only('delete');

    }
    public function index(Request $request)
    {
        //
//        $categories=Category::all();
//        return view('adminDashboard.Categories.index',compact('categories'));
        $categories = Category::where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('name_en','like','%'.$request->search.'%');
            });
        })->paginate(4);





        return view('adminDashboard.Categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Categories.create
        return view('AdminDashboard.Categories.create');
    }
    public function getSubCategories(Category $category,Request $request){

//$subCategories=$category->subcategory;
        $subCategories =$category->subcategory()->where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('name','like','%'.$request->search.'%');
            });
        })->get();
        return view('AdminDashboard.Categories.SubCategories.index',compact('subCategories','category'));
    }
public function createSubCategory(Category $category){
        return view('AdminDashboard.Categories.create',compact('category'));
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate( [
            'name_ar'=>'required|min:3',
            'name_en'=>'required|min:3|unique:categories,name_en',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
//        $image = $request->image;
//        $input['file'] = time().'.'.$image->getClientOriginalExtension();
//
//        $destinationPath = public_path('/assets/dist/img/Category-images');
//        $imgFile = Image::make($image->getRealPath());
//        $imgFile->resize(150, 150, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($destinationPath.'/'.$input['file']);
//        $destinationPath = public_path('/uploads');
//        $image->move($destinationPath, $input['file']);
        if($request->hasFile('image')){
            $filename = Str::slug(time().rand(1000,9999)).'.'.$request->image->getClientOriginalExtension();
            $path=public_path('/assets/images/categories/'.$filename);
            \Intervention\Image\ImageManagerStatic::make($request->image->getRealPath())->save($path,100);



        }
        Category::create([
           'name_en'=>$request->name_en,
           'name_ar'=>$request->name_ar,
           'image'=>$filename??"default.png",
        ]);

    return redirect()->route('Category.index')->with('success','category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
        return  view('AdminDashboard.Categories.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        //
        $request->validate( [
            'name_en'=>'min:3|unique:categories,name_en,'.$Category->id,


            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:10240',
        ]);
        $request_data=$request->except('image');

        if($request->hasFile('image')){

            if(isset($category->image)&&File::exists('assets/images/categories/'.$category->image))
            {
                unlink('assets/images/categories/'.$category->image);
            }
            $filename = Str::slug(time().rand(1000,9999)).'.'.$request->image->getClientOriginalExtension();
            $path=public_path('/assets/images/categories/'.$filename);
            \Intervention\Image\ImageManagerStatic::make($request->image->getRealPath())->save($path,100);

$request_data['image']=$filename;

        }
        $Category->update($request_data);

        return redirect()->route('Category.index')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {




        if(isset($Category->image)&&File::exists('assets/images/categories/'.$Category->image))
        {
            unlink('assets/images/categories/'.$Category->image);
        }
            $Category->delete();
            return redirect()->route('Category.index')->with('success','Category  delete successfully !');
//        }
//        return redirect()->back();
    }
}
