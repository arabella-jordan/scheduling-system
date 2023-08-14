<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Event;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class EventTable extends DataTableComponent
{
    protected $model = Event::class;
    public $startDateTime;
    public $endDateTime;
    public $createdDateTime;
    public $updatedDateTime;

    public function configure(): void
    {
        $this->setDefaultSort('event_start', 'asc');

        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.event-table-buttons',
            'toolbar-left-end' => 'layouts.components.buttons.event-calendar-button'
        ]);

    }


    public function columns(): array
    {
        $event = new Event();
        $event->event_start = $this->startDateTime;
        $event->event_end = $this->endDateTime;
        $event->created_at = $this->createdDateTime;
        $event->updated_at = $this->updatedDateTime;


        //=====table formatting=====
        return [
            Column::make('Actions')
                ->label(
                    fn($row, Column $column)  => view('layouts.components.buttons.rows.event-row-button')->withRow($row)
                )
                ->html(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable()
                ->searchable(),
            Column::make("Room", "room.name")
                ->sortable()
                ->searchable(),
            // BooleanColumn::make("Activity", "is_active")
            //     ->sortable(),
            Column::make("Start Time", "event_start")
                ->format(
                    fn($startDateTime, $row, Column $column) => Carbon::parse($startDateTime)->toDayDateTimeString()
                )
                ->sortable()
                ->searchable(),
            Column::make("End Time", "event_end")
                ->format(
                fn($endDateTime, $row, Column $column) => Carbon::parse($endDateTime)->toDayDateTimeString()
                )
                ->sortable()
                ->searchable(),
            Column::make("Created", "created_at")
                ->format(
                    fn($createdDateTime, $row, Column $column) => Carbon::parse($createdDateTime)->format('g:i a F d, Y')
                )
                ->sortable()
                ->searchable(),
            Column::make("Latest Update At", "updated_at")
                ->format(
                    fn($updatedDateTime, $row, Column $column) => Carbon::parse($updatedDateTime)->format('g:i a F d, Y')
                )
                ->sortable()
                ->searchable(),
            Column::make("Event ID", "id")
                ->sortable()
                ->searchable(),

        ];
    }
}
