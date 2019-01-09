# Tesseract Crypto SDK PHP

array_dot method to navigate into array

[![Build Status](https://travis-ci.org/00F100/array_dot.svg?branch=master)](https://travis-ci.org/00F100/array_dot) [![codecov](https://codecov.io/gh/00F100/array_dot/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/array_dot) [![Total Downloads](https://poser.pugx.org/00F100/array_dot/downloads)](https://packagist.org/packages/00F100/array_dot)

## How to install

Composer:

```sh
$ composer require tesseract/crypto-sdk
```

or add in composer.json

```json
{
    "require": {
        "tesseract/crypto-sdk": "^0.2.1"
    }
}
```

## How to use

```php
<?php

use Tesseract\Crypto\SDK\ConfigBase;
use Tesseract\Crypto\SDK\CryptoSDK;


$config = new ConfigBase('https://sandbox.tesseract.mx', 'your_access_key_id', 'your_secret_access_key');

$sdk = new CryptoSDK($config);

try {
    
    $auth = $sdk->auth();
    
    print_r(json_encode($auth->getBody()));
    
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    error_log($e->getMessage());
}

```