<?php

namespace App\Http\Livewire\Projects;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $project;
    public $name_en;
    public $details_en;
    public $name_ar;
    public $details_ar;
    public $code;
    public $category_id;
    public $image;
    public $start_date;
    public $end_date;
    public $location;

    public function render()
    {
        return view('livewire.projects.create',[
            'categories'=>Category::all(),
        ]);
    }
    public function  save(){
        $this->validate([
            'name_en'=>['required','string','min:3'],
            'name_ar'=>['string','min:3'],
            'details_en'=>['required','string','min:20'],
            'details_ar'=>['string','min:20'],
            'code'=>['required','min:8'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

                'category_id'=>['required']


            ]


        );
        $data['name_en'] = $this->name_en;
        $data['name_ar'] = $this->name_ar;
        $data['details_en'] = $this->details_en;
        $data['details_ar'] = $this->details_ar;
        $data['code'] = $this->code;
$data['start_date']=$this->start_date;
$data['end_date']=$this->end_date;
        $data['location'] = $this->location;
        $data['category_id']=$this->category_id;
        $data['user_id']=auth()->id();
        if(isset($this->image)){
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/projects/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }
        $project=Project::create($data);
        if(isset($filename)){
        $project->images()->create([
           'image' =>$filename
        ]);}
        if($project)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
            $this->resetInputs();
            $this->emit('projectAdded',$project);

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
        $this->start_date=null;
        $this->end_date=null;
       $this->category_id=null;
       $this->image=null;
       $this->location=null;
    }
}
