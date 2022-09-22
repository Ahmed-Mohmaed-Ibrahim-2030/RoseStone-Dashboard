<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddImage extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name_en;
    public $product;
    public $image_org;
    public $image;
    protected $listeners=[
        'addImage'=>'add_image'
    ];

    public function render()
    {
        return view('livewire.products.add-image');
    }
    public function add_image($product){
        $this->product=$product;
        $this->product_id=$this->product['id'];
        $this->name_en=$this->product['name_en'];

        isset(Product::find($this->product_id)->images()->first()->image)? $this->image_org=Product::find($this->product_id)->images()->first()->image:"";
    }
    public function add(){
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

        ]);
        if(isset($this->image)){
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/products/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }

        if(isset($filename)){
            Product::find($this->product_id)->images()->create([
                'image' =>$filename
            ]);}



        $this->emit('imageAdded','Image Added');





    }
}
