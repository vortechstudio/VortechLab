<?php

namespace App\Livewire\Post;

use App\Services\VortechAPI\Social\CercleService;
use Illuminate\Http\Request;
use Livewire\Component;

class Preview extends Component
{
    public $info = [];

    public function mount(Request $request)
    {
        $this->info = $request->all();
    }
    public function render()
    {
        $apiCercle = new CercleService();
        $all = collect($apiCercle->all());
        //dd($this->all());
        return view('livewire.post.preview', [
            'cercle_name' => $all->where('id', $this->info['cercle'])->first()->name,
        ])
            ->layout('components.layouts.app');
    }
}
