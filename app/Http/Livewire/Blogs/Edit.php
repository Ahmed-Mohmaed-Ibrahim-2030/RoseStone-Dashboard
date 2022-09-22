<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;

class Edit extends Component
{
    use WithFileUploads;
    public $blog_id;
    public $blog;
    public $title_en;
    public $body_en;
    public $title_ar;
    public $body_ar;
    public $type;
    public $category_id;

    public $image;
    public $image_org;
    protected $listeners=['getBlog'=>'get_blog'];
    public function render()
    {
        return view('livewire.blogs.edit',[

            'blog'=>$this->blog,
            'categories'=>Category::all()]);
    }
    public function mount(){
        $this->blog=Blog::whereId($this->blog_id)->where('admin_id',auth()->id())->first();


}

    public function update(){
        $this->validate([
                'title_en'=>['required','string','min:5'],
                'title_ar'=>['string','min:5'],
                'body_en'=>['required','string','min:20'],
                'body_ar'=>['string','min:20'],
                'type'=>['required','min:8'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


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
            if(isset($this->image_org)&&File::exists('assets/images/blogs/'.$this->image_org))
            {
                unlink('assets/images/blogs/'.$this->image_org);
            }
            $filetitle = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/blogs/'.$filetitle);
            Image::make($this->image->getRealPath())->save($path,100);
            $data['image']=$filetitle;
        }
       $blog=Blog::find($this->blog_id)->update($data);
//
//        if(isset($filetitle)){
//            $first_image=Blog_Image::where('blog_id',$this->blog_id)->first();
//            if(isset( $first_image)){
//                $first_image->update([
//                'image' =>$filetitle
//            ]);}
//        else
//        {
//            Blog_Image::create([
//                'blog_id'=>$this->blog_id,
//                'image' =>$filetitle,
//            ]);
//
//        }


//        }
        if($blog)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
//            $this->resetInputs();
            $this->emit('blogUpdated',Blog::find($this->blog_id));

        }
        else {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'something went wrong',
//                'alert-type' => 'danger',
//            ]);
            $this->emit('failedOperation');
        }


    }
    public function get_blog($blog){
        $this->blog=$blog;
        $this->blog_id=$this->blog['id'];
        $this->title_en=$this->blog['title_en'];
        $this->body_en=$this->blog['body_en'];
        $this->title_ar=$this->blog['title_ar'];
        $this->body_ar=$this->blog['body_ar'];
        $this->type=$this->blog['type'];

        $this->category_id=$this->blog['category_id'];

        isset($this->blog['image'])? $this->image_org=$this->blog['image']:"";

    }
}
