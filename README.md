# SellFirst Roles

🍅 ACL Roles / Permissions for [SellFirstPHP](https://sell-first.com/) build with [Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction)

## Installation

```bash
composer require sellfirstphp/sell-first-roles
```

to make your model accept roles you must add this trait to it

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

after installation use this command to install the package and publish assets
```bash
php artisan sellfirstphp/sell-first-roles
```


**You should publish** the migration and the config file with:

```bash
php artisan vendor:publish --provider="SellFirstPHP\SellFirstRoles\SellFirstRolesServiceProvider"
```

## Credits

- [Goldoni Fouotsa](https://github.com/fgoldoni)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
