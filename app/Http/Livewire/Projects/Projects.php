<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public $showCreateProject=false;
    public $showAddImage=false;
    public $showEditProject=false;
    public $deleteId='';
    protected $listeners=[
        'projectAdded'=>'refreshCreateProject',
        'projectUpdated'=>'refreshUpdateProject',
        'failedOperation'=>'refreshUnuthorizedAction',
        'imageAdded'=>'refreshSuccessAction',
    ];

        public function toggle_create(){
        $this->showCreateProject=!$this->showCreateProject;
        $this->showEditProject=false;
    }
        public function toggle_edit(){
        $this->showEditProject=!$this->showEditProject;
        $this->showCreateProject=false;
    }
    public function render()
    {

        return view('livewire.projects.projects',[
            'projects'=>Project::with(['user','category'])->orderBy('id','desc')->paginate(5),
        ])->extends('layouts.adminDashboard')->section('content');
    }
    public function create_project(){


    }
    public function edit_project($id){
    $project= Project::with(['user','category'])->whereId($id)->where('user_id',auth()->id())->first();
    if($project){
$this->emit('getProject',$project);
$this->showCreateProject=false;
$this->showEditProject=!$this->showEditProject;
    }
    else{

    }

    }
    public function add_image($id){
    $project= Project::whereId($id)->where('user_id',auth()->id())->first();
    if($project){
$this->emit('addImage',$project);
$this->showCreateProject=false;
$this->showEditProject=false;
$this->showAddImage=!$this->showAddImage;
    }
    else{

    }

    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_project(){
        $project= Project::with(['user','category'])->whereId($this->deleteId)->where('user_id',auth()->id())->first();
        if($project){
           if($project->images)
           {
               foreach($project->images as $image){
                   if(File::exists('assets/images/projects/'.$image->image))
                   {
                       unlink('assets/images/projects/'.$image->image);
                   }
                   $project->images()->delete();
                   $project->delete();
                   session()->flash('success', 'Project deleted successfully');
               }
           }
        }
        else{
            session()->flash('danger', 'your are not able to do that');
        }


    }

    public function show_project(){

    }
    public function refreshCreateProject($company)
    {
        session()->flash('success', 'Project created successfully');
        $this->setShowComponents();
    }
    public function refreshUpdateProject($company)
    {
        session()->flash('success', 'Project Updated Successfully');
        $this->setShowComponents();

    }
    public function refreshUnuthorizedAction($action )
    {
        session()->flash('danger', 'You are not allowed to do '.$action);
        $this->setShowComponents();

    }
    public function refreshSuccessAction($action )
    {
        session()->flash('success', $action .'successfully');
        $this->setShowComponents();

    }
    private function setShowComponents(){

        $this->showEditProject=false;
        $this->showCreateProject=false;
        $this->showAddImage=false;
    }
}
