<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Create extends Component
{
    use Actions;
    public $name;
    public $description;
    public $capacity;

    public $rules =[
        'name' => 'required',
        'capacity' => 'required|integer|gt:0',
    ];

    public function create(){
        $this->validate();

        try{
            DB::beginTransaction();

            $room = new Room();
            $room->name = $this->name;
            $room->slug = Str::slug('name', '-');
            $room->description = $this->description;
            $room->capacity = $this->capacity;

            if($room->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Room Saved",
                    $description = "The room was successfully saved"
                );
            }
            else{
                DB::rollback();
                $this->dialog()->success(
                    $title ="Error !!!",
                    $description = "Room was not saved"
                );
            }
        }
        catch(\Throwable $th){
            DB::rollback();
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.room.create');
    }
}
