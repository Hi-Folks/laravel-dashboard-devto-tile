<?php

namespace HiFolks\DevtoTile;

use Spatie\Dashboard\Models\Tile;

class DevtoStore
{
    private Tile $tile;

    public const TILE_NAME= "DevtoTile";
    public const TILE_KEY_ARTICLES = "keyDevtoArticles";

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName(self::TILE_NAME);
    }

    public function setData(array $data): self
    {
        $this->tile->putData(self::TILE_KEY_ARTICLES, $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData(self::TILE_KEY_ARTICLES) ?? [];
    }
}
