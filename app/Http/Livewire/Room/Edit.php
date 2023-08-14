<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;
    public $name;
    public $description;
    public $capacity;
    public $room;

    public function mount(Room $room){
        $this->room = $room;
        $this->name = $room->name; //select * from user where id= user
        $this->description = $room->description;
        $this->capacity = $room->capacity;
    }

    public function update($id){

        $validated = Validator::make(
            [
                'name' =>$this->name,
                'description' =>$this->description,
                'capacity' =>$this->capacity,

            ],
            [
                'name' =>
                [
                    'required',
                    Rule::unique('rooms', 'id'),
                ],
                'description' => 'required',
                'capacity' => 'required|integer|gt:0',
            ],
        )->validate();

        try{
            DB::beginTransaction();

            $room = Room::find($id);
            $room->name = $this->name;
            $room->description = $this->description;
            $room->capacity = $this->capacity;

            if($room->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Room Updated",
                    $description = 'Room was successfully saved'
                );
            }else{
                DB::rollback();
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description = 'Room was not saved'
                );
            }

        }catch(\Throwable $th){
            DB::rollBack();
            dd($th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.room.edit');
    }

}
