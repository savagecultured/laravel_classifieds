<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class PostAd extends Component
{
    public $title, $description, $price;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric|min:0',
    ];

    public function submit()
    {
        $this->validate();

        Ad::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Ad posted successfully.');
        $this->reset(); // Clear the form
        $this->emit('adPosted'); // For live refresh
    }

    public function render()
    {
        return view('livewire.post-ad');
    }
}
