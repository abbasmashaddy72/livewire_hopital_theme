<?php

namespace App\Http\Livewire\Backend\Modals;

use App\Models\Service;
use LivewireUI\Modal\ModalComponent;

class ServicesModal extends ModalComponent
{
    // Set Values
    public $service_id;
    //Model Values
    public $service_department_id, $name, $icon, $description;

    protected $rules = [
        'service_department_id' => 'required',
        'name' => 'required',
        'icon' => 'required',
        'description' => 'nullable'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if (!empty($this->service_id)) {
            Service::where('id', $this->service_id)->update($validatedData);
        } else {
            Service::create($validatedData);
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function mount()
    {
        if (!empty($this->service_id)) {
            $data = Service::findOrFail($this->service_id);
            $this->service_department_id = $data->service_department_id;
            $this->name = $data->name;
            $this->icon = $data->icon;
            $this->description = $data->description;
        }
    }

    public function render()
    {
        return view('livewire.backend.modals.services-modal');
    }
}
