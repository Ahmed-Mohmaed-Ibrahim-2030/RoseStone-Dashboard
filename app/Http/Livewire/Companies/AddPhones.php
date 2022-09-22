<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;

use Livewire\Component;


class AddPhones extends Component
{

    public $company_id;
    public $name_en;
    public $company;

    public $phone;


protected $listeners=[
    'addPhone'
];
    public function render()
    {
        return view('livewire.companies.add-phones',[
           'company'=> $this->company
        ]);
    }
    public function mount(){


        $this->company=Company::with(['social_links'])->find($this->company_id);
    }

    public function add(){
        $this->validate([
            'phone' => ['required', 'string',  'unique:company__phones,phone'],

        ]);



          Company::find($this->company_id)->phones()->create([

              'phone'=>$this->phone
          ]);



        $this->emit('successAction',"phone added ");




    }
    public function addPhone($company){
        $this->company=$company;

        $this->company_id=$this->company['id'];
//        dd($this->company_id);
        $this->name_en=$this->company['name_en'];

    }
}
