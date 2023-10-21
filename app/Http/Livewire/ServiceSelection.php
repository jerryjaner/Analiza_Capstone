<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Service};

class ServiceSelection extends Component
{
    public $selectService = null;
    public $description = null;

    public function render()
    {
        $service = Service::find($this->selectService);

        return view('livewire.service-selection', [
            'services' => Service::all(),
            'selectedService' => $service,
        ]);
    }
}
