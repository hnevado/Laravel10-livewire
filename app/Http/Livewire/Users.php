<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    public $users, $name, $email, $password;

    public function render()
    {
        $this->users = User::latest()->orderBy('id','DESC')->get();
        return view('livewire.users');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|max:190|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);


        $this->name = '';
        $this->email = '';
        $this->password = '';

        //session()->flash('message','Usuario creado correctamente');
        $this->success();

    }

    public function success() 
    {
        //Disparamos un evento que se verá reflejado en el navegador
        //$this->dispatchBrowserEvent('alert',['message' => 'Usuario creado correctamente']);
        toastr()->success("Usuario creado correctamente");
    }

    public function destroy(User $user)
    {

        $user->delete();
        toastr()->warning("Usuario eliminado correctamente");

    }

}
