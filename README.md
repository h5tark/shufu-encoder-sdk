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

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hoang@77-apps.com instead of using the issue tracker.

## Credits

- [Hoang Stark](https://github.com/hoangstark)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.