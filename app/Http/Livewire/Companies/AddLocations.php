<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;

use Livewire\Component;


class AddLocations extends Component
{

    public $company_id;
    public $name_en;
    public $company;
    public $branch;
    public $location;


protected $listeners=[
    'addPhone'
];
    public function render()
    {
        return view('livewire.companies.add-locations',[
           'company'=> $this->company
        ]);
    }
    public function mount(){


        $this->company=Company::with(['locations'])->find($this->company_id);
    }

    public function add(){
        $this->validate([
            'branch'=>'required|string',
            'location' => ['required', 'string',  'unique:company__locations,location'],

        ]);


if(Company::find($this->company_id)->locations()->where('branch',$this->branch)->first()){
    Company::find($this->company_id)->locations()->where('branch',$this->branch)->first()->update([
        'location'=>$this->location
        ]);
    $this->emit('successAction',"location of $this->branch updated ");
        }
else{
    Company::find($this->company_id)->locations()->create([
        'branch'=>$this->branch,
        'location'=>$this->location
    ]);
    $this->emit('successAction',"location of $this->branch added ");//
}








    }
    public function addPhone($company){
        $this->company=$company;

        $this->company_id=$this->company['id'];
//        dd($this->company_id);
        $this->name_en=$this->company['name_en'];

    }
}
