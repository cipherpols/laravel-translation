## Localization from a database

This package is used as an **in-database replacement** for the default TranslationServiceProvider. Keys will be added to the database **automatically**. Fallback translating is supported. It's easy to build a GUI to manage all translation strings

## Installation

Require this package with composer:

```
composer require cipherpols/laravel-translation
```

Add new Translation ServiceProvider to config/app.php

```
\CipherPols\Translation\ServiceProvider::class,
```

Migrations
```
php artisan vendor:publish --provider="CipherPols\Translation\ServiceProvider" --tag="migrations" 
```

and afterwards run your migrations:
```
php artisan migrate
```
