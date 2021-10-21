# json-request-result

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/json-request-result-php)](https://github.com/brokeyourbike/json-request-result-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/json-request-result-php/downloads)](https://packagist.org/packages/brokeyourbike/json-request-result-php)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/json-request-result-php/blob/main/LICENSE)

[![ci](https://github.com/brokeyourbike/json-request-result-php/actions/workflows/ci.yml/badge.svg)](https://github.com/brokeyourbike/json-request-result-php/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/brokeyourbike/json-request-result-php/branch/main/graph/badge.svg?token=ImcgnxzGfc)](https://codecov.io/gh/brokeyourbike/json-request-result-php)
[![Maintainability](https://api.codeclimate.com/v1/badges/a1f7d2769e5f738c8c2a/maintainability)](https://codeclimate.com/github/brokeyourbike/json-request-result-php/maintainability)

Interface and trait for JSON responses

## Installation

```bash
composer require brokeyourbike/json-request-result
```

## Usage

```php
use Psr\Http\Message\ResponseInterface;
use BrokeYourBike\JsonRequestResult\JsonRequestResultTrait;
use BrokeYourBike\JsonRequestResult\JsonRequestResultInterface;

class Result implements JsonRequestResultInterface
{
    use JsonRequestResultTrait;

    public function __construct(ResponseInterface $response)
    {
        $this->statusCode = $response->getStatusCode();
        $this->responseBody = (string) $response->getBody();
    }
}
```

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/json-request-result-php/blob/main/LICENSE)
