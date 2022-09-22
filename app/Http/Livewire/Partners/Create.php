<?php

namespace App\Http\Livewire\Partners;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $partner;
    public $name;
    public $email;
    public $phone;

    public $image;

    public function render()
    {
        return view('livewire.partners.create');
    }
    public function  save(){
        $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:partners'],

                'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:partners'],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]


        );
        $data['name'] = $this->name;
        $data['phone'] = $this->phone;
        $data['email'] = $this->email;

        if(isset($this->image)){
            $filetitle = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/partners/'.$filetitle);
            Image::make($this->image->getRealPath())->save($path,100);
            $data['logo']=$filetitle;
        }
        $partner=Partner::create($data);

        if($partner)
        {
//            return redirect()->to('livewire/post/index')->with([
//                'message' =>'post created successfully',
//                'alert-type' => 'success',
//            ]);
            $this->resetInputs();
            $this->emit('partnerAdded',$partner);

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
        $this->name=null;
        $this->email=null;
        $this->phone=null;

        $this->image=null;

    }
}
