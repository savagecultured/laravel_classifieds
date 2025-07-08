<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="title" placeholder="Ad Title">
        <textarea wire:model="description" placeholder="Description"></textarea>
        <input type="number" wire:model="price" placeholder="Price">
        <button type="submit">Post Ad</button>
    </form>
</div>
