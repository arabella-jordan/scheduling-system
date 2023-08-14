<?php

namespace App\Http\Livewire\Tables;

use App\Models\Event;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Room;
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RoomTable extends DataTableComponent
{
    protected $model = Room::class;
    public $createdDateTime;
    public $updatedDateTime;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // default sort
        $this->setDefaultSort('name', 'asc');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.room-table-buttons',
        ]);
    }

    public function columns(): array
    {
        $room = new Room();
        $room->created_at = $this->createdDateTime;
        $room->updated_at = $this->updatedDateTime;


        //=====table formatting=====
        return [
            Column::make('Actions')
                ->label(
                    fn($row, Column $column)  => view('layouts.components.buttons.rows.room-row-button')->withRow($row)
                )
                ->html(),
            Column::make("Room", "name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Capacity", "capacity")
                ->sortable()
                ->searchable(),
            // BooleanColumn::make("Availability", "is_active")
            //     ->sortable(),
            Column::make("Created", "created_at")
                ->format(
                    fn($createdDateTime, $row, Column $column) => Carbon::parse($createdDateTime)->format('g:i a F d, Y')
                )
                ->sortable(),
            Column::make("Latest Update", "updated_at")
                ->format(
                    fn($updatedDateTime, $row, Column $column) => Carbon::parse($updatedDateTime)->format('g:i a F d, Y')
                )
                ->sortable(),
            Column::make("Room ID", "id")
                ->sortable()
                ->searchable(),
        ];
    }
}
