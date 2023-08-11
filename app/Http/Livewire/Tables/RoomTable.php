<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Room;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RoomTable extends DataTableComponent
{
    protected $model = Room::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.room-table-buttons',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Room ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Room", "name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Capacity", "capacity")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Availability", "is_active")
                ->sortable(),
            Column::make("Created", "created_at")
                ->sortable(),
            Column::make("Latest Update at", "updated_at")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    fn($row, Column $column)  => view('layouts.components.buttons.rows.room-row-button')->withRow($row)
                )
                ->html(),
        ];
    }
}
