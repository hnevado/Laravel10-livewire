<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;

    public $user, $file;

   
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {

        return view('livewire.avatar')->extends('layouts.app')->section('content');
    }

    public function upload()
    {
        $this->validate([
                'file' => 'required|image|max:2048'
            ]);

        $this->user->update([
            'avatar' => $this->file->store('avatar','public')
        ]);    


        toastr()->success("Avatar actualizado!");

    }

}
