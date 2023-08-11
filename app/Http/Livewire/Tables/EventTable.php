<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Event;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class EventTable extends DataTableComponent
{
    protected $model = Event::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.event-table-buttons',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Room ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Availability", "is_active")
                ->sortable(),
            Column::make("Start Time", "event_start")
                ->sortable()
                ->searchable(),
            Column::make("End Time", "event_end")
                ->sortable()
                ->searchable(),
            Column::make("Created", "created_at")
                ->sortable()
                ->searchable(),
            Column::make("Latest Update At", "updated_at")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    fn($row, Column $column)  => view('layouts.components.buttons.rows.event-row-button')->withRow($row)
                )
                ->html(),
        ];
    }
}
