<?php

namespace App\Http\Livewire;

use App\Models\Course;

use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Course::where('title','like','%'. $this->search . '%')
        ->where('status',3)
        ->get()->take(8);
    }
}
