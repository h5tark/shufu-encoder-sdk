# Shufu Encoder PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hoangstark/shufu-encoder-sdk.svg?style=flat-square)](https://packagist.org/packages/hoangstark/shufu-encoder-sdk)
[![Build Status](https://img.shields.io/travis/hoangstark/shufu-encoder-sdk/master.svg?style=flat-square)](https://travis-ci.org/hoangstark/shufu-encoder-sdk)
[![Quality Score](https://img.shields.io/scrutinizer/g/hoangstark/shufu-encoder-sdk.svg?style=flat-square)](https://scrutinizer-ci.com/g/hoangstark/shufu-encoder-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/hoangstark/shufu-encoder-sdk.svg?style=flat-square)](https://packagist.org/packages/hoangstark/shufu-encoder-sdk)

Use this SDK to login via username & password, then get the access token.

## Installation

You can install the package via composer:

```bash
composer require hoangstark/shufu-encoder-sdk
```

## Usage

### Login

``` php
<?php

namespace App\Http\Controllers;

use Hoangstark\ShufuEncoderSdk\ShufuEncoderSdk;

class LoginController extends Controller
{
    protected function login()
    {
        $shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login('http://localhost/api/login', 'shufu', 'secret');
        return $shufuEncoder->getAccessToken();
    }
}
```

### Get tasks
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$tasks = $shufuEncoder->getTasks();
```

### Get encoding tasks
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$tasks = $shufuEncoder->getEncodingTasks();
```

### Get single task
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$task = $shufuEncoder->getTask(1);
```

### Get single task encoding progress
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$percentage = $shufuEncoder->getTaskProgress(1);
```

### Create task
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$task = $shufuEncoder->createTask(array(
    "webhook_success" => "https://enpii3jcfpr19.x.pipedream.net",
    "webhook_error" => "https://en4vdjmi70ib.x.pipedream.net/",
));

echo $task->message // Task created
```

### Update task
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$task = $shufuEncoder->updateTask(1, array(
    "webhook_success" => "https://enpii3jcfpr19.x.pipedream.net",
    "webhook_error" => "https://en4vdjmi70ib.x.pipedream.net/",
));

echo $task->message // Task updated
```

### Dispatch task to queue
```php
$shufuEncoder = new ShufuEncoderSdk;
$shufuEncoder->login('http://localhost:8080/api', 'shufu', 'secret');

$queue = $shufuEncoder->queueTask(1);

echo $queue->message // Task does not have file | Task already encoded | Task queue dispatched
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Hoang Stark](https://github.com/hoangstark)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
