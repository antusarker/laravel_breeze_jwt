## Project about laravel auth breeze with JWT

## Require php
PHP 8.2

## Create Project
```bash
composer create-project --prefer-dist laravel/laravel:^11.0 your-project-name
```

## Install laravel breeze
```bash
composer require laravel/breeze --dev
```

## Set Default String Length
=> app/Providers/AppServiceProvider.php
Add this line to the boot() method:

```bash
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```

## install jwt
```bash
composer require tymon/jwt-auth

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret
```

Now set into guard for API and users Models.

All set.

## Ensure Postman sends the right headers (for showing validation error)
In Postman, under the Headers tab:

Header	Value
Accept	application/json ✅
Content-Type	application/json ✅
Authorization	Bearer <your_token> ✅

