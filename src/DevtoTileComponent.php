<?php

namespace HiFolks\DevtoTile;

use Livewire\Component;

class DevtoTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        return view('dashboard-devto-tile::tile', [
            'articles' => DevtoStore::make()->getData(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.devto.refresh_interval_in_seconds', 60),

        ]);
    }
}
