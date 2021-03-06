# Tile for retrieving articles from DEV.to

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hi-folks/laravel-dashboard-devto-tile.svg?style=flat-square)](https://packagist.org/packages/hi-folks/laravel-dashboard-devto-tile)

Tile for retrieving your articles from DEV.to.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).


## Installation

You can install the package via composer:

```bash
composer require hi-folks/laravel-dashboard-devto-tile
```

## Usage

In your dashboard view you use the `livewire:devto-tile` component.

```html
<x-dashboard>
    <livewire:devto-tile position="e7:e16" />
</x-dashboard>
```

## Obtain your DEV.to API KEY

Go to https://dev.to/settings/account and create your API KEY.
You need to store your api key in your .env file.
Remember to avoid to commit .env file :)
THe key for storing your api key is: DEVTO_TILE_APIKEY

```
DEVTO_TILE_APIKEY="yourapikeyfromdevto"
```

In config/dashboard.php please, add:
```
'tiles' => [
        'devto' => [
            'configurations' => [
                'default' => [
                    'api_key' => env('DEVTO_TILE_APIKEY'),
                ],
            ],
            'refresh_interval_in_seconds' => 5,
        ],
    ],
```

In order to retrieve articles from DEV.to automatically, you need to schedule your command.
Go to Kernel.php file and add this line.

```php
$schedule->command("dashboard:fetch-data-from-devto-api", [])->everyFiveMinutes();
```

## The tile
If you completed the setup correctly you could see in your dashboard your new tile.
![Screenshot of the Tile with DEV.to articles](screenshot-tile.png)

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.



## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
