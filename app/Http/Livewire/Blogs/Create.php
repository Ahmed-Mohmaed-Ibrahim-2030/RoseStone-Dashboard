<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $blog;
    public $title_en;
    public $body_en;
    public $title_ar;
    public $body_ar;
    public $type;
    public $category_id;
    public $image;

    public function render()
    {
        return view('livewire.blogs.create',[
            'categories'=>Category::all(),
        ]);
    }
    public function  save(){
        $this->validate([
                'title_en'=>['required','string','min:5'],

                'body_en'=>['required','string','min:20'],
                'body_ar'=>['string','min:20'],
                'type'=>['min:5'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                'category_id'=>['required']


            ]


        );
        $data['title_en'] = $this->title_en;
        $data['title_ar'] = $this->title_ar;
        $data['body_en'] = $this->body_en;
        $data['body_ar'] = $this->body_ar;
        $data['type'] = $this->type;


        $data['category_id']=$this->category_id;
        $data['admin_id']=auth()->id();
        if(isset($this->image)){
            $filetitle = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/blogs/'.$filetitle);
            Image::make($this->image->getRealPath())->save($path,100);
            $data['image']=$filetitle;
        }
        $blog=Blog::create($data);

        if($blog)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
            $this->resetInputs();
            $this->emit('blogAdded',$blog);

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
        $this->title_en=null;
        $this->body_en=null;
        $this->title_ar=null;
        $this->body_ar=null;
        $this->type=null;

        $this->category_id=null;
        $this->image=null;

    }
}
