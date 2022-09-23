<?php

namespace App\Http\Livewire\Projects;

use App\Models\Category;
use App\Models\Project_Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;

class Edit extends Component
{
    use WithFileUploads;
    public $project_id;
    public $project;
    public $name_en;
    public $details_en;
    public $name_ar;
    public $details_ar;
    public $code;
    public $end_date;
    public $category_id;
    public $start_date;
    public $location;
    public $image;
    public $image_org;
    protected $listeners=['getProject'=>'get_project'];

    public function render()
    {
        return view('livewire.projects.edit',[

            'project'=>$this->project,
            'categories'=>Category::all()]);
    }
    public function mount(){
        $this->project=Project::whereId($this->project_id)->where('user_id',auth()->id())->first();


}

    public function update(){
        $this->validate([
                'name_en'=>['string','min:3'],
                'name_ar'=>['string','min:3'],
                'details_en'=>['string','min:20'],
                'details_ar'=>['string','min:20'],
                'code'=>['min:8'],
                'image' => isset($this->image)?'image|mimes:jpeg,png,jpg,gif,svg|max:10240':"",


            ]


        );

        $data['name_en'] = $this->name_en;
        $data['name_ar'] = $this->name_ar;
        $data['details_en'] = $this->details_en;
        $data['details_ar'] = $this->details_ar;
        $data['code'] = $this->code;
        $data['end_date'] = $this->end_date;
        $data['start_date'] = $this->start_date;
        $data['category_id']=$this->category_id;
        $data['location']=$this->location;
        $data['user_id']=auth()->id();

        if(isset($this->image)){
            if(isset($this->image_org)&&File::exists('assets/images/projects/'.$this->image_org))
            {
                unlink('assets/images/projects/'.$this->image_org);
            }
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/projects/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }
       $project=Project::find($this->project_id)->update($data);

        if(isset($filename)){
            $first_image=Project_Image::where('project_id',$this->project_id)->first();
            if(isset( $first_image)){
                $first_image->update([
                'image' =>$filename
            ]);}
        else
        {
            Project_Image::create([
                'project_id'=>$this->project_id,
                'image' =>$filename,
            ]);

        }


        }
        if($project)
        {

            $this->emit('projectUpdated',Project::find($this->project_id));

        }
        else {

            $this->emit('failedOperation');
        }


    }
    public function get_project($project){
        $this->project=$project;
        $this->project_id=$this->project['id'];
        $this->name_en=$this->project['name_en'];
        $this->details_en=$this->project['details_en'];
        $this->name_ar=$this->project['name_ar'];
        $this->details_ar=$this->project['details_ar'];
        $this->code=$this->project['code'];
        $this->end_date=$this->project['end_date'];
        $this->category_id=$this->project['category_id'];
        $this->start_date=$this->project['start_date'];
        $this->location=$this->project['location'];

        isset(Project::find($this->project_id)->images()->first()->image)? $this->image_org=Project::find($this->project_id)->images()->first()->image:"";

    }
}
