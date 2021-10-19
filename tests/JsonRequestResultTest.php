<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Tests\JsonRequestResult;

use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;
use BrokeYourBike\Tests\JsonRequestResult\RequestResultFixture;
use BrokeYourBike\JsonRequestResult\JsonRequestResultTrait;
use BrokeYourBike\JsonRequestResult\JsonRequestResultInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class JsonRequestResultTest extends TestCase
{
    /** @test */
    public function it_implemets_json_request_result_interface(): void
    {
        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);

        /** @var ResponseInterface $mockedResponse */
        $requestResult = new RequestResultFixture($mockedResponse);

        $this->assertInstanceOf(JsonRequestResultInterface::class, $requestResult);
    }

    /** @test */
    public function it_uses_json_request_result_trait(): void
    {
        $usedTraits = class_uses(RequestResultFixture::class);

        $this->assertArrayHasKey(JsonRequestResultTrait::class, $usedTraits);
    }

    /** @test */
    public function it_can_return_status_code()
    {
        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);

        /** @var ResponseInterface $mockedResponse */
        $requestResult = new RequestResultFixture($mockedResponse);

        $this->assertSame(200, $requestResult->getStatusCode());
    }

    /** @test */
    public function it_can_return_response_body()
    {
        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')->willReturn('{}');

        /** @var ResponseInterface $mockedResponse */
        $requestResult = new RequestResultFixture($mockedResponse);

        $this->assertSame('{}', $requestResult->getResponseBody());
    }

    /** @test */
    public function it_can_parse_valid_json_string()
    {
        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')->willReturn('{"ping":true}');

        /** @var ResponseInterface $mockedResponse */
        $requestResult = new RequestResultFixture($mockedResponse);

        $this->assertSame(['ping' => true], $requestResult->getJson());
    }

    /** @test */
    public function it_will_return_null_if_json_string_invalid()
    {
        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')->willReturn('{"hello": "word"');

        /** @var ResponseInterface $mockedResponse */
        $requestResult = new RequestResultFixture($mockedResponse);

        $this->assertSame(null, $requestResult->getJson());
    }
}
