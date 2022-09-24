<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product_Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class Edit extends Component
{
    use WithFileUploads;
    public $product_id;
    public $product;
    public $name_en;
    public $details_en;
    public $name_ar;
    public $details_ar;
    public $code;
    public $price;
    public $category_id;
    public $expected_time;
    public $image;
    public $image_org;
    protected $listeners=['getProduct'=>'get_product'];

    public function render()
    {
        return view('livewire.products.edit',[

            'product'=>$this->product,
            'categories'=>Category::all()]);
    }
    public function mount(){
        $this->product=Product::whereId($this->product_id)->where('user_id',auth()->id())->first();


    }

    public function update(){
        $this->validate([
                'name_en'=>['string','min:3'],
                'name_ar'=>['string','min:3'],
                'details_en'=>['string','min:20'],
                'details_ar'=>['string','min:20'],
                'code'=>['min:8','unique:products,code,'.$this->product_id],
                'image' => isset($this->image)?'image|mimes:jpeg,png,jpg,gif,svg|max:10240':"",
                'price'=>['min:1'],


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
            if(isset($this->image_org)&&File::exists('assets/images/products/'.$this->image_org))
            {
                unlink('assets/images/products/'.$this->image_org);
            }
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/products/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }
        $product=Product::find($this->product_id)->update($data);

        if(isset($filename)){
            $first_image=Product_Image::where('product_id',$this->product_id)->first();
            if(isset( $first_image)){
                $first_image->update([
                    'image' =>$filename
                ]);}
            else
            {
                Product_Image::create([
                    'product_id'=>$this->product_id,
                    'image' =>$filename,
                ]);

            }


        }
        if($product)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
//            $this->resetInputs();
            $this->emit('productUpdated',Product::find($this->product_id));

        }
        else {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'something went wrong',
//                'alert-type' => 'danger',
//            ]);
            $this->emit('failedOperation');
        }


    }
    public function get_product($product){
        $this->product=$product;
        $this->product_id=$this->product['id'];
        $this->name_en=$this->product['name_en'];
        $this->details_en=$this->product['details_en'];
        $this->name_ar=$this->product['name_ar'];
        $this->details_ar=$this->product['details_ar'];
        $this->code=$this->product['code'];
        $this->price=$this->product['price'];
        $this->category_id=$this->product['category_id'];
        $this->expected_time=$this->product['expected_time'];

        isset(Product::find($this->product_id)->images()->first()->image)? $this->image_org=Product::find($this->product_id)->images()->first()->image:"";

    }
}
