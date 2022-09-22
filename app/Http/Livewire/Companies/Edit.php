<?php

namespace App\Http\Livewire\Companies;

use App\Models\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

class Edit extends Component
{
    use WithFileUploads;
    public $company_id;
    public $company;
    public $name_en;
    public $about_en;
    public $name_ar;
    public $about_ar;
    public $preface_en;
    public $vision_ar;
    public $email;
    public $vision_en;
    public $preface_ar;
    public $url;

    protected $listeners=['getCompany'=>'get_company'];
    public function render()
    {
        return view('livewire.companies.edit',[

            'company'=>$this->company,
            ]);
    }
    public function mount(){

        $this->company=Company::find($this->company_id);


}

    public function update(){
        $this->validate([
                'name_en'=>['string','min:5'],
                'name_ar'=>['string','min:5'],
                'about_en'=>['string','min:20'],
                'about_ar'=>['string','min:20'],
                'vision_ar'=>['min:20'],
                'preface_en'=>['string','min:20'],
                'preface_ar'=>['string','min:20'],
                'email' => [ 'string', 'email', 'max:255', 'unique:companies,email,'.$this->company_id],

                'url' => [ 'string',  'unique:companies,web_site_url,'.$this->company_id],

                'vision_en'=>['string','min:20']


            ]


        );

        $data['name_en'] = $this->name_en;
        $data['name_ar'] = $this->name_ar;
        $data['about_en'] = $this->about_en;
        $data['about_ar'] = $this->about_ar;
        $data['preface_en'] = $this->preface_en;
        $data['vision_ar'] = $this->vision_ar;
        $data['vision_en'] = $this->vision_en;
        $data['email']=$this->email;
        $data['preface_ar']=$this->preface_ar;
        $data['web_site_url']=$this->url;


       $company=Company::find($this->company_id)->update($data);


        if($company)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
//            $this->resetInputs();
            $this->emit('companyAdded',Company::find($this->company_id));

        }
        else {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'something went wrong',
//                'alert-type' => 'danger',
//            ]);
            $this->emit('failedOperation');
        }


    }
    public function get_company($company){
        $this->company=$company;

        $this->company_id=$this->company['id'];
        $this->name_en=$this->company['name_en'];
        $this->about_en=$this->company['about_en'];
        $this->name_ar=$this->company['name_ar'];
        $this->about_ar=$this->company['about_ar'];
        $this->preface_en=$this->company['preface_en'];
        $this->vision_ar=$this->company['vision_ar'];
        $this->email=$this->company['email'];
        $this->vision_en=$this->company['vision_en'];
        $this->preface_ar=$this->company['preface_ar'];

       $this->url=$this->company['web_site_url'];

    }
}
