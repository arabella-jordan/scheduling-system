<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Carbon\Carbon;

class UserTable extends DataTableComponent
{
    protected $model = User::class;
    public $createdDateTime;
    public $updatedDateTime;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setConfigurableAreas([
            'toolbar-left-start' => 'layouts.components.buttons.user-table-buttons',
        ]);
    }

    public function columns(): array
    {

        $user = new User();
        $user->created_at = $this->createdDateTime;
        $user->updated_at = $this->updatedDateTime;

        //=====table formatting=====
        return [
            Column::make('Actions')
                ->label(
                    fn($row, Column $column)  => view('layouts.components.buttons.rows.user-row-buttons')->withRow($row)
                )
                ->html(),
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("First name", "first_name")
                ->sortable()
                ->searchable(),
            Column::make("Middle name", "middle_name")
                ->sortable()
                ->searchable(),
            Column::make("Last name", "last_name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->format(
                    fn($createdDateTime, $row, Column $column) => Carbon::parse($createdDateTime)->format('g:i a F d, Y')
                )
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->format(
                    fn($updatedDateTime, $row, Column $column) => Carbon::parse($updatedDateTime)->format('g:i a F d, Y')
                )
                ->sortable()
                ->searchable(),
        ];
    }
}
