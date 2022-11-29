<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Service;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ServicesTable extends LivewireDatatable
{
    public $model = Service::class;
    public $exportable = true;

    public function builder()
    {
        return Service::query()->with('department');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('name')
                ->searchable()
                ->filterable(),

            Column::name('department.title')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('description')
                ->label('Description')
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.services.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
