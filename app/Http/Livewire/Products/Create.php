<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $product;
    public $name_en;
    public $details_en;
    public $name_ar;
    public $details_ar;
    public $code;
    public $price;
    public $category_id;
    public $image;
    public $expected_time;

    public function render()
    {
        return view('livewire.products.create',[
            'categories'=>Category::all(),
        ]);
    }
    public function  save(){
        $this->validate([
                'name_en'=>['required','string','min:3'],
                'name_ar'=>['string','min:3'],
                'details_en'=>['required','string','min:20'],
                'details_ar'=>['string','min:20'],
                'code'=>['required','min:8','unique:products,code'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'price'=>['min:1'],
                'category_id'=>['required']


            ]


        );
        $data['name_en'] = $this->name_en;
        $data['name_ar'] = $this->name_ar;
        $data['details_en'] = $this->details_en;
        $data['details_ar'] = $this->details_ar;
        $data['code'] = $this->code;
        $data['price'] = $this->price;
        $data['expected_time'] = $this->expected_time;
        $data['category_id']=$this->category_id;
        $data['user_id']=auth()->id();
        if(isset($this->image)){
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/products/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }
        $product=Product::create($data);
        if(isset($filename)){
            $product->images()->create([
                'image' =>$filename
            ]);}
        if($product)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
            $this->resetInputs();
            $this->emit('productAdded',$product);

        }
        else {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'something went wrong',
//                'alert-type' => 'danger',
//            ]);
            $this->emit('failedOperation');
        }

    }
    private function resetInputs(){
        $this->name_en=null;
        $this->details_en=null;
        $this->name_ar=null;
        $this->details_ar=null;
        $this->code=null;
        $this->price=null;
        $this->category_id=null;
        $this->image=null;
        $this->expected_time=null;
    }
}
