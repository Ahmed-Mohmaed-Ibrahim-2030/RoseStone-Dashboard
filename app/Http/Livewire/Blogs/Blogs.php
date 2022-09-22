<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public $showCreateBlog=false;
    public $showAddImage=false;
    public $showEditBlog=false;
    public $deleteId='';
    protected $listeners=[
        'blogAdded'=>'refreshCreateBlog',
        'blogUpdated'=>'refreshUpdateBlog',
        'failedOperation'=>'refreshUnuthorizedAction',
    ];
        public function toggle_create(){
        $this->showCreateBlog=!$this->showCreateBlog;
        $this->showEditBlog=false;
    }
        public function toggle_edit(){
        $this->showEditBlog=!$this->showEditBlog;
        $this->showCreateBlog=false;
    }
    public function render()
    {

        return view('livewire.blogs.blogs',[
            'blogs'=>Blog::with(['user','category'])->orderBy('id','desc')->paginate(5),
        ])->extends('layouts.adminDashboard')->section('content');
    }
    public function create_blog(){


    }
    public function edit_blog($id){
    $blog= Blog::with(['user','category'])->whereId($id)->where('admin_id',auth()->id())->first();
    if($blog){
$this->emit('getBlog',$blog);
$this->showCreateBlog=false;
$this->showEditBlog=!$this->showEditBlog;
    }
    else{

    }

    }
    public function add_image($id){
    $blog= Blog::whereId($id)->where('user_id',auth()->id())->first();
    if($blog){
$this->emit('addImage',$blog);
$this->showCreateBlog=false;
$this->showEditBlog=false;
$this->showAddImage=!$this->showAddImage;
    }
    else{

    }

    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_blog(){
        $blog= Blog::with(['user','category'])->whereId($this->deleteId)->where('admin_id',auth()->id())->first();
        if($blog){

                   if(isset($blog->image)&&File::exists('assets/images/blogs/'.$blog->image))
                   {
                       unlink('assets/images/blogs/'.$blog->image);
                   }

                   $blog->delete();
                   session()->flash('success', 'Blog deleted successfully');


        }
        else{
            session()->flash('danger', 'your are not able to do that');
        }


    }

    public function show_blog(){

    }

    public function refreshCreateBlog($company)
    {
        session()->flash('success', 'Blog created successfully');
        $this->setShowComponents();
    }
    public function refreshUpdateBlog($company)
    {
        session()->flash('success', 'Blog Updated Successfully');
        $this->setShowComponents();

    }
    public function refreshUnuthorizedAction($action )
    {
        session()->flash('danger', 'You are not allowed to do '.$action);
        $this->setShowComponents();

    }
    private function setShowComponents(){

        $this->showEditBlog=false;
        $this->showCreateBlog=false;
        $this->showAddImage=false;
    }
}
