<?php

namespace App\Http\Livewire\Partners;

use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Partners extends Component
{
    use WithPagination;

    public $showCreatePartner=false;
    public $showAddImage=false;
    public $showEditPartner=false;
public $deleteId='';
    protected $listeners=[
        'partnerAdded'=>'refreshCreatePartner',
        'partnerUpdated'=>'refreshUpdatePartner',
        'failedOperation'=>'refreshUnuthorizedAction',
    ];
        public function toggle_create(){
        $this->showCreatePartner=!$this->showCreatePartner;
        $this->showEditPartner=false;
    }
        public function toggle_edit(){
        $this->showEditPartner=!$this->showEditPartner;
        $this->showCreatePartner=false;
    }
    public function render()
    {

        return view('livewire.partners.partners',[
            'partners'=>Partner::orderBy('id','desc')->paginate(5),
        ])->extends('layouts.adminDashboard')->section('content');
    }
    public function create_partner(){


    }
    public function edit_partner($id){
    $partner= Partner::find($id);
    if($partner){
$this->emit('getPartner',$partner);
$this->showCreatePartner=false;
$this->showEditPartner=!$this->showEditPartner;
    }
    else{

    }

    }
    public function add_image($id){
    $partner= Partner::find($id);
    if($partner){
$this->emit('addImage',$partner);
$this->showCreatePartner=false;
$this->showEditPartner=false;
$this->showAddImage=!$this->showAddImage;
    }
    else{

    }

    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete_partner(){
        $partner= Partner::find($this->deleteId);
        if($partner){

               if($partner->logo){
                   if(File::exists('assets/images/partners/'.$partner->logo))
                   {
                       unlink('assets/images/partners/'.$partner->logo);
                   }

                   $partner->delete();
                   session()->flash('success', 'Partner deleted successfully');
               }
           }

        else{
            session()->flash('danger', 'your are not able to do that');
        }


    }

    public function show_partner(){

    }

    public function refreshCreatePartner($company)
    {
        session()->flash('success', 'Partner created successfully');
        $this->setShowComponents();
    }
    public function refreshUpdatePartner($company)
    {
        session()->flash('success', 'Partner Updated Successfully');
        $this->setShowComponents();

    }
    public function refreshUnuthorizedAction($action )
    {
        session()->flash('danger', 'You are not allowed to do '.$action);
        $this->setShowComponents();

    }
    private function setShowComponents(){

        $this->showEditPartner=false;
        $this->showCreatePartner=false;

    }
}
