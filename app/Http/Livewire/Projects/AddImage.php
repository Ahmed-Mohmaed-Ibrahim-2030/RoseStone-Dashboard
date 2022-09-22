<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddImage extends Component
{
    use WithFileUploads;
    public $project_id;
    public $name_en;
    public $project;
    public $image_org;
    public $image;
protected $listeners=[
    'addImage'=>'add_image'
];
    public function render()
    {
        return view('livewire.projects.add-image');
    }
    public function add_image($project){
        $this->project=$project;
        $this->project_id=$this->project['id'];
        $this->name_en=$this->project['name_en'];

        isset(Project::find($this->project_id)->images()->first()->image)? $this->image_org=Project::find($this->project_id)->images()->first()->image:"";
    }
    public function add(){
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

        ]);
        if(isset($this->image)){
            $filename = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/projects/'.$filename);
            Image::make($this->image->getRealPath())->save($path,100);
//            $data['image']=$filename;
        }

        if(isset($filename)){
            Project::find($this->project_id)->images()->create([
                'image' =>$filename
            ]);}



        $this->emit('imageAdded','Image Added');





    }
}
