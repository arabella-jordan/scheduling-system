<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Room;

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
            Column::make("Availability", "is_active")
                ->sortable(),
            Column::make("Created", "created_at")
                ->sortable(),
            Column::make("Updated Time", "updated_at")
                ->sortable(),
        ];
    }
}
