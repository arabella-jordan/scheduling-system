<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;
    public $event;
    public $name;
    public $description;
    public $roomId;
    public $startDateTime;
    public $endDateTime;

    public function mount(Event $event){
        $this->event = $event;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->roomId = $event->room_id;
        $this->startDateTime = $event->event_start;
        $this->endDateTime = $event->event_end;
    }

    public function update($id){
        $validated = Validator::make(
            [
                'name' =>$this->name,
                'description' =>$this->description,
                'roomId' =>$this->roomId,
                'startDateTime' => $this->startDateTime,
                'endDateTime' =>$this->endDateTime,

            ],
            [
                'name' => [
                    'required',
                    Rule::unique('events', 'id'),
                ],
                'description' => 'required',
                'roomId' => 'required',
                'startDateTime' => 'required',
                'endDateTime' =>'required',

            ],
        )->validate();
        try{
            DB::beginTransaction();

            $event = Event::find($id);
            $event->name = $this->name;
            $event->description = $this->description;
            $event->room_id = $this->roomId;
            $event->event_start = $this->startDateTime;
            $event->event_end = $this->endDateTime;

            if($event->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Profile Saved",
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
        return view('livewire.event.edit');
    }
}
