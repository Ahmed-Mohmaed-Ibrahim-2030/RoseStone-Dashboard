<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    public $deleteId = '';
    use WithPagination;

    public $showCreateProduct=false;
    public $showAddImage=false;
    public $showEditProduct=false;
    protected $listeners=[
        'productAdded'=>'refreshCreateProduct',
        'productUpdated'=>'refreshUpdateProduct',
        'failedOperation'=>'refreshUnuthorizedAction',
        'imageAdded'=>'refreshSuccessAction',
    ];
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function toggle_create(){
        $this->showCreateProduct=!$this->showCreateProduct;
        $this->showEditProduct=false;
        $this->showAddImage=false;
    }
    public function toggle_edit(){
        $this->showAddImage=false;
        $this->showEditProduct=!$this->showEditProduct;
        $this->showCreateProduct=false;

    }

    public function render()
    {

        return view('livewire.products.products',[
            'products'=>Product::with(['user','category'])->orderBy('id','desc')->paginate(5),
        ])->extends('layouts.adminDashboard')->section('content');
    }
    public function create_product(){


    }
    public function edit_product($id){
        $product= Product::with(['user','category'])->whereId($id)->where('user_id',auth()->id())->first();
        if($product){
            $this->emit('getProduct',$product);
            $this->showCreateProduct=false;
            $this->showEditProduct=!$this->showEditProduct;
            $this->showAddImage=false;
        }
        else{

        }

    }
    public function add_image($id){
        $product= Product::whereId($id)->where('user_id',auth()->id())->first();
        if($product){
            $this->emit('addImage',$product);
            $this->showCreateProduct=false;
            $this->showEditProduct=false;
            $this->showAddImage=!$this->showAddImage;
        }
        else{

        }

    }
    public function delete_product(){
        $product= Product::with(['user','category'])->whereId($this->deleteId)->where('user_id',auth()->id())->first();

        if($product){
            if($product->images)
            {
                foreach($product->images as $image){
                    if(File::exists('assets/images/products/'.$image->image))
                    {
                        unlink('assets/images/products/'.$image->image);
                    }
                    $product->images()->delete();
                    $product->delete();
                    session()->flash('success', 'Product deleted successfully');
                }
            }
        }
        else{
            session()->flash('danger', 'your are not able to do that');
        }


    }

    public function show_product(){

    }

    public function refreshCreateProduct($company)
    {
        session()->flash('success', 'Product created successfully');
        $this->setShowComponents();
    }
    public function refreshUpdateProduct($company)
    {
        session()->flash('success', 'Product Updated Successfully');
        $this->setShowComponents();

    }
    public function refreshUnuthorizedAction($action )
    {
        session()->flash('danger', 'You are not allowed to do '.$action);
        $this->setShowComponents();

    }
    public function refreshSuccessAction($action )
    {
        session()->flash('success', $action .' successfully');
        $this->setShowComponents();

    }
    private function setShowComponents(){

        $this->showEditProduct=false;
        $this->showCreateProduct=false;
        $this->showAddImage=false;
    }
}
