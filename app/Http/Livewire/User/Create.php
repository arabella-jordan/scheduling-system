<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;


class Create extends Component
{
    use Actions;
    public $firstName;
    public $middleName;
    public $lastName;
    public $email;
    public $password;
    public $password_confirmation;

    public $rules =[
        'firstName' => 'required|alpha',
        'lastName' => 'required|alpha',
        'middleName' => 'alpha',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8',
    ];

    public function create(){

        //Validate
        $this->validate();

        try{
            DB::beginTransaction();

            $user = new User;
            $user->first_name = $this->firstName;
            $user->middle_name = $this->middleName;
            $user->last_name = $this->lastName;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);

            if($user->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = 'Profile Saved',
                    $description = 'Your profile was successfully saved'
                );
            }else{
                DB::rollback();
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description = 'Your profile was not saved'
                );
            }
        }catch(\Throwable $th){
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
