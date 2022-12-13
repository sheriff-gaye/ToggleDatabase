<?php

namespace App\Http\Livewire;

use App\Models\Toggle;
use Livewire\Component;

class ToggleSwitch extends Component
{
    public $name;
    public $status;


    public function render()
    {
        $names=Toggle::latest()->get();
        return view('livewire.toggle-switch',compact('names'));
    }

    protected $rules=[
        'name'=>'required|unique:toggles'
    ];


    public function save(){
        $this->validate();
        Toggle::create(['name'=>$this->name]);
        $this->name='';
        session()->flash('message','Name is successfully created');

    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function status($id,$status){
        $posts=Toggle::find($id);
        $status=='0'? $posts->update(['status'=>'1']) : $posts->update(['status'=>'0']);
        session()->flash('message','Status is successfully  updated');
    }

}
