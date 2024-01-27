<?php

namespace App\Livewire\Component;

use App\Services\VortechAPI\Api;
use Livewire\Component;

class SearchInput extends Component
{
    public $query;

    public $results;

    public function mount()
    {
        $this->resetField();
    }

    public function resetField()
    {
        $this->query = '';
        $this->results = [];
    }

    public function updateQuery()
    {

    }

    public function render()
    {
        $api = new Api();
        $this->results = $api->searching($this->query);

        //dd($this->results);
        return view('livewire.component.search-input', [
            'results' => $this->results,
        ]);
    }
}
