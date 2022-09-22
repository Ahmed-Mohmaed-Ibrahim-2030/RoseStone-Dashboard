<?php

namespace App\Http\Livewire\Companies;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $company;
    public $name_en;
    public $about_en;
    public $name_ar;
    public $about_ar;
    public $vision_ar;
    public $vision_en;
    public $url;
    public $preface_en;
    public $preface_ar;
    public $email;
    public function render()
    {
        return view('livewire.companies.create',[
            'categories'=>Category::all(),
        ]);
    }
    public function  save(){
        $this->validate([
            'name_en'=>['required','string','min:5'],
            'name_ar'=>['string','min:5'],
            'about_en'=>['required','string','min:20'],
            'about_ar'=>['string','min:20'],
            'vision_ar'=>['required','min:20'],
               'preface_en'=>['required','string','min:20'],
               'preface_ar'=>['required','string','min:20'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],

                'url' => ['required', 'string',  'unique:companies,web_site_url'],

                'vision_en'=>['required','string','min:20']


            ]


        );
        $data['name_en'] = $this->name_en;
        $data['name_ar'] = $this->name_ar;
        $data['about_en'] = $this->about_en;
        $data['about_ar'] = $this->about_ar;
        $data['vision_ar'] = $this->vision_ar;
$data['preface_en']=$this->preface_en;
$data['preface_ar']=$this->preface_ar;
        $data['email'] = $this->email;
        $data['vision_en']=$this->vision_en;
        $data['web_site_url']=$this->url;

        $company=Company::create($data);

        if($company)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
            $this->resetInputs();
            $this->emit('companyAdded',$company);

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
       $this->about_en=null;
       $this->name_ar=null;
       $this->about_ar=null;
       $this->vision_ar=null;
        $this->preface_en=null;
        $this->preface_ar=null;
       $this->vision_en=null;
       $this->url=null;
       $this->email=null;
    }
}
