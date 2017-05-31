Lumen 钉钉
==============

Dingding send message.

## Installation

You can install the package via composer:

```bash
composer require liugj/lumen-dingding
```

You must add the Scout service provider and the package service provider in your `bootstrap/app.php` line 80 config:

```php
$app->register(Liugj\DingDing\DingServiceProvider::class);
```

## Configuration 

Publish the config file into your project by edit `config/ding.php` line 62:

```bash
    'access_token' => '70f5caa93c4704c4c16c236efbeab96340e64db19eeca2e3b6831cbd415d8104'
```

Add Xunsearch settings into `.env` file:

```
DINGDING_ACCESS_TOKEN=70f5caa93c4704c4c16c236efbeab96340e64db19eeca2e3b6831cbd415d8104
```

## Usage

## Credits

- [liugj](https://github.com/liugj)
- [All Contributors](../../contributors)

## License

The MIT License (MIT).
