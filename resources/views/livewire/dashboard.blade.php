<?php

use Livewire\Volt\Component;
use App\Models\ListeningParty;
use Livewire\Attributes\Validate;

new class extends Component {

    #[Validate('require|string|max:255')]
    public  string $name = '';

    #[Validate('required')]
    public $startTime;

    #[Validate('require|url')]
    public string $mediaUrl = '';

    public function createListeningParty()
    {
        $this->validate();

        $episode = Episode::create([
            'media_url' => $this->mediaUrl,
        ]);

        $listeningParty = ListeningParty::create([
            'episode_id' => $episode->id,
            'name'=> $this->name,
            'start_time' => $this->startTime,
        ]);
    }

    public function with()
    {
        return [
            'listening_parties' => ListeningParty::all(),
        ];
    }
}; ?>

<div class="flex items-center justify-center min-h-screen bg-slate-50">
    <div class="max-w-lg w-full px-4">
        <form wire:submit='crearteListeningParty' class="space-y-6">
            <x-input wire:model='name' placeholder="Listening Party Name" />
            <x-input wire:model='mediaUrl' placeholder="Podcast Episode URL" description='Direct Episode Link or YouTube Link, RSS Feeds will grab the latest episode' />
            <x-datetime-picker wire:model='startTime' placeholder="Listening Party start Time" />
            <x-button primary type='submit'>Create Listening Party</x-button>
        </form>
    </div>
</div>
