<?php

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Models\Sub_Category;
use Illuminate\Http\Request;


class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('AdminDashboard.Categories.SubCategories.create');
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
            'name'=>'required|min:3',
'category_id'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/dist/img/SubCategory-images/'), $imageName);


        }
        Sub_Category::create([
            'name'=>$request->name,
'category_id'=>$request->category_id,
            'image'=>$imageName,
        ]);
        return redirect()->route('getSubCategories',$request->category_id);
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
    public function edit(Sub_Category $SubCategory)
    {
        //
//        dd($SubCategory);
        return view('AdminDashboard.Categories.SubCategories.edit',compact('SubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_Category $SubCategory)
    {
        //

        $request->validate( [
            'name'=>'min:3',

            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $request_data=$request->except('image');
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/dist/img/SubCategory-images/'), $imageName);


            $request_data['image']=$imageName;
        }
        $SubCategory->update($request_data);
        return redirect()->route('SubCategory.edit',$SubCategory);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_Category $SubCategory)
    {
        //
//        dd($SubCategory);
        $SubCategory->delete();
        return redirect()->back();

    }
}
