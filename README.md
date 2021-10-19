# json-request-result

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/json-request-result)](https://github.com/brokeyourbike/json-request-result/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/json-request-result/downloads)](https://packagist.org/packages/brokeyourbike/json-request-result)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/json-request-result/blob/main/LICENSE)
[![ci](https://github.com/brokeyourbike/json-request-result/actions/workflows/ci.yml/badge.svg)](https://github.com/brokeyourbike/json-request-result/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/brokeyourbike/json-request-result/branch/main/graph/badge.svg?token=ImcgnxzGfc)](https://codecov.io/gh/brokeyourbike/json-request-result)
[![Type Coverage](https://shepherd.dev/github/brokeyourbike/json-request-result/coverage.svg)](https://shepherd.dev/github/brokeyourbike/json-request-result)

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
[Mozilla Public License v2.0](https://github.com/brokeyourbike/json-request-result/blob/main/LICENSE)
