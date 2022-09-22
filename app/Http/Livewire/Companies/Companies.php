<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;

    public $showCreateCompany=false;
    public $showAddSocialLinks=false;
    public $showEditCompany=false;
    public $showAddPhones=false;
    public $showAddLocations=false;

    protected $listeners=[
        'companyAdded'=>'refreshCreateCompany',
        'companyUpdated'=>'refreshUpdateCompany',
        'failedOperation'=>'refreshUnuthorizedAction',
        'successAction'=>'refreshSuccessAction',
    ];
        public function toggle_create(){
        $this->showCreateCompany=!$this->showCreateCompany;
        $this->showEditCompany=false;
    }
        public function toggle_edit(){
        $this->showEditCompany=!$this->showEditCompany;
        $this->showCreateCompany=false;
    }
    public function render()
    {

        return view('livewire.companies.companies',[
            'companies'=>Company::orderBy('id','desc')->paginate(5),
        ])->extends('layouts.adminDashboard')->section('content');
    }
    public function create_company(){


    }
    public function edit_company($id){
    $company= Company::find($id);
    if($company){
$this->emit('getCompany',$company);
$this->showCreateCompany=false;
$this->showEditCompany=!$this->showEditCompany;
    }
    else{

    }

    }
    public function add_social($id){
    $company= Company::with(['social_links'])->find($id);
    if($company){

$this->emit('addSocialLinks',$company);
$this->showCreateCompany=false;
$this->showEditCompany=false;
$this->showAddSocialLinks=!$this->showAddSocialLinks;
    }
    else{

    }

    }
    public function add_phones($id){
    $company= Company::with(['phones'])->find($id);
    if($company){

$this->emit('addPhone',$company);
$this->showCreateCompany=false;
$this->showEditCompany=false;
$this->showAddSocialLinks=false;
$this->showAddPhones=!$this->showAddPhones;
    }
    else{

    }

    }
    public function add_location($id){
    $company= Company::with(['locations'])->find($id);
    if($company){

$this->emit('addPhone',$company);
$this->showCreateCompany=false;
$this->showEditCompany=false;
$this->showAddSocialLinks=false;
$this->showAddPhones=false;
$this->showAddLocations=!$this->showAddLocations;
    }
    else{

    }

    }
    public function delete_company($id){
        $company= Company::find($id);
        if($company){
           if($company->images)
           {
               foreach($company->images as $image){
                   if(File::exists('assets/images/companies/'.$image->image))
                   {
                       unlink('assets/images/companies/'.$image->image);
                   }
                   $company->images()->delete();
                   $company->delete();
                   session()->flash('success', 'Company deleted successfully');
               }
           }
        }
        else{
            session()->flash('danger', 'your are not able to do that');
        }


    }

    public function show_company(){

    }
    public function refreshCreateCompany($company)
    {
        session()->flash('success', 'Company created successfully');
      $this->setShowComponents();
    }
    public function refreshUpdateCompany($company)
    {
        session()->flash('success', 'Company Updated Successfully');
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

        $this->showEditCompany=false;
        $this->showCreateCompany=false;
        $this->showAddSocialLinks=false;
        $this->showAddPhones=false;
        $this->showAddLocations=false;
    }
}
