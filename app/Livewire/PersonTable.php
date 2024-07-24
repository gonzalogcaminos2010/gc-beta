<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Person;

class PersonTable extends Component
{
    public $search = '';

    public function render()
    {
        $persons = Person::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('dni', 'like', '%' . $this->search . '%')
            ->orWhere('cuil', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.person-table', [
            'persons' => $persons,
        ])->layout('layouts.app');
    }
}