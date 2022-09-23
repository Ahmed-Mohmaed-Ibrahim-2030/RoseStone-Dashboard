<?php

namespace App\Http\Livewire\Partners;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Partner;

class Edit extends Component
{
    use WithFileUploads;
    public $partner_id;
    public $partner;
    public $name;
    public $email;
    public $phone;


    public $image;
    public $image_org;
    protected $listeners=['getPartner'=>'get_partner'];
    public function render()
    {
        return view('livewire.partners.edit',[

            'partner'=>$this->partner]);

    }
    public function mount(){
        $this->partner=Partner::find($this->partner_id);


}

    public function update(){
        $this->validate([
                'name' => [ 'string', 'max:255'],
//
            'email' => 'string|email|max:255|unique:partners,email,'.$this->partner_id,

                'phone' => ['string', 'max:11','unique:partners,phone,'.$this->partner_id],

                'image' => isset($this->image)?'image|mimes:jpeg,png,jpg,gif,svg|max:10240':"",

            ]


        );

        $data['name'] = $this->name;
        $data['phone'] = $this->phone;
        $data['email'] = $this->email;


        if(isset($this->image)){
            if(isset($this->image_org)&&File::exists('assets/images/partners/'.$this->image_org))
            {
                unlink('assets/images/partners/'.$this->image_org);
            }
            $filetitle = Str::slug(time().rand(1000,9999)).'.'.$this->image->getClientOriginalExtension();
            $path=public_path('/assets/images/partners/'.$filetitle);
            Image::make($this->image->getRealPath())->save($path,100);
            $data['logo']=$filetitle;
        }
       $partner=Partner::find($this->partner_id)->update($data);

        if($partner)
        {

            $this->emit('partnerUpdated',Partner::find($this->partner_id));

        }
        else {

            $this->emit('failedOperation',' Edit This Partner ');
        }


    }
    public function get_partner($partner){
        $this->partner=$partner;
        $this->partner_id=$this->partner['id'];
        $this->name=$this->partner['name'];
        $this->email=$this->partner['email'];
        $this->phone=$this->partner['phone'];


        isset($this->partner['logo'])? $this->image_org=$this->partner['logo']:"";

    }
}
