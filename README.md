# Tesseract Crypto SDK PHP

[![Build Status](https://travis-ci.org/00F100/array_dot.svg?branch=master)](https://travis-ci.org/00F100/array_dot) [![codecov](https://codecov.io/gh/00F100/array_dot/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/array_dot) [![Total Downloads](https://poser.pugx.org/00F100/array_dot/downloads)](https://packagist.org/packages/00F100/array_dot)

## How to install Tesseract Crypto SDK PHP

The recommended way to install Tesseract Crypto SDK PHP is through Composer.

```bash

    # Install Composer
    curl -sS https://getcomposer.org/installer | php
    
```

Next, run the Composer command to install the latest stable version of Guzzle:

```bash

    php composer.phar require tesseract/crypto-sdk
    
```

After installing, you need to require Composer's autoloader:

```php

    require 'vendor/autoload.php';

```

## Configuration

```php
<?php

return [
  
  /*
  |--------------------------------------------------------------------------
  | Default Base URL
  |--------------------------------------------------------------------------
  */
  'tesseract.crypto.baseUrl' => 'https://sandbox.tesseract.mx',
  
  /*
  |--------------------------------------------------------------------------
  | Default Access Key ID
  |--------------------------------------------------------------------------
  */
  'tesseract.crypto.access_key_id' => '[your_access_key_id]',
   
  /*
  |--------------------------------------------------------------------------
  | Default Secret Access Key
  |--------------------------------------------------------------------------
  */
  'tesseract.crypto.secret_access_key' => '[your_secret_access_key]',
   
  /*
  |--------------------------------------------------------------------------
  | Default Debug
  |--------------------------------------------------------------------------
  */
  'tesseract.crypto.debug' => false,
   
  /*
  |--------------------------------------------------------------------------
  | Default Timeout
  |--------------------------------------------------------------------------
  */
  'tesseract.crypto.timeout' => 5.000

];

```

## How to use

```php
<?php

require 'vendor/autoload.php';

use Tesseract\Crypto\SDK\CryptoSDK;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\Options\Config;
use Tesseract\Crypto\SDK\Options\HttpClientConfig;

$configs = include('config.php');

$httpClientConfig = new HttpClientConfig($configs[Config::BASE_URL], 
    $configs[Config::ACCESS_KEY_ID], 
    $configs[Config::SECRET_ACCESS_KEY], 
    $configs[Config::DEBUG], 
    $configs[Config::TIMEOUT]);

$sdk = new CryptoSDK($httpClientConfig);

$response = $sdk->auth();

if($response->getStatusCode() == StatusCode::OK)
{
    if($response->getBody()->isReadable())
        echo $response->getBody()->getContents();
}

```