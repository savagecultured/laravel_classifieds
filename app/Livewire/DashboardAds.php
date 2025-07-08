<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class DashboardAds extends Component
{
    public $ads;

    protected $listeners = ['adPosted' => 'refreshAds'];

    public function mount()
    {
        $this->refreshAds();
    }

    public function refreshAds()
    {
        $this->ads = Ad::where('user_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard-ads');
    }
}
