namespace App\Http\Livewire;

use Livewire\Component;

class PostAd extends Component
{
    public $title, $description, $price;

    public function submit()
    {
        // Validate and save ad logic
    }

    public function render()
    {
        return view('livewire.post-ad');
    }
}
