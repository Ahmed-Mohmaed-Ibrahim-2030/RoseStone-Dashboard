<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;

use Livewire\Component;


class AddSocialLinks extends Component
{

    public $company_id;
    public $name_en;
    public $company;
    public $site_name;
    public $url;
    public $social_links;

protected $listeners=[
    'addSocialLinks'
];

    public function render()
    {
        return view('livewire.companies.add-social-links',[
           'company'=> $this->company
        ]);
    }
    public function mount(){


        $this->company=Company::with(['social_links'])->find($this->company_id);
    }

    public function add(){
        $this->validate([
            'url' => ['required', 'string',  'unique:company__social__links,url'],

        ]);


      if(Company::find($this->company_id)->social_links()->where('site_name',$this->site_name)->first()){
          Company::find($this->company_id)->social_links()->where('site_name',$this->site_name)->first()->update([
             'url'=>$this->url
          ]);
           $this->emit('successAction',"link  of $this->site_name updated ");
      }
      else{
          Company::find($this->company_id)->social_links()->create([
              'site_name'=>$this->site_name,
              'url'=>$this->url
          ]);
           $this->emit('successAction',"link  of $this->site_name added ");//
      }









    }
    public function addSocialLinks($company){
        $this->company=$company;
//        dd($this->company);
        $this->company_id=$this->company['id'];
//        dd($this->company_id);
        $this->name_en=$this->company['name_en'];
        $this->social_links=$this->company['social_links'];
    }
}
