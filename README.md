# json-request-result

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/json-request-result-php)](https://github.com/brokeyourbike/json-request-result-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/json-request-result/downloads)](https://packagist.org/packages/brokeyourbike/json-request-result)
[![Maintainability](https://api.codeclimate.com/v1/badges/a1f7d2769e5f738c8c2a/maintainability)](https://codeclimate.com/github/brokeyourbike/json-request-result-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a1f7d2769e5f738c8c2a/test_coverage)](https://codeclimate.com/github/brokeyourbike/json-request-result-php/test_coverage)

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

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/json-request-result-php/blob/main/LICENSE)
