<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
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
    public $startDateTime;
    public $endDateTime;
    public $roomId;

    public $rules =[
        'name' => 'required',
        'roomId'=> 'required',
        'startDateTime' => 'required',
        'endDateTime' => 'required',
    ];

    public function create(){
        $this->validate();

        try{
            DB::beginTransaction();

            $event = new Event();
            $event->name = $this->name;
            $event->slug = Str::slug('$name', '-');
            $event->description = $this->description;
            $event->event_start = $this->startDateTime;
            $event->event_end = $this->endDateTime;
            $event->room_id = $this->roomId;

            if($event->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = 'Event Saved',
                    $description = "The event was successfully saved."
                );
            }
            else{
                DB::rollback();
                $this->dialog()->error(
                    $title = "Error !!!",
                    $description = "Your profile was not saved"
                );
            }

        }catch(\throwable $th){
            DB::rollback();
            dd($th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.event.create');
    }
}
