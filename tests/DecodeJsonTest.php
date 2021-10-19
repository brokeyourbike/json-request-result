<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Tests\JsonRequestResult;

use PHPUnit\Framework\TestCase;
use BrokeYourBike\JsonRequestResult\JsonRequestResultTrait;
use BrokeYourBike\JsonRequestResult\JsonRequestResultInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class DecodeJsonTest extends TestCase
{
    /** @test */
    public function it_implemets_json_request_result_interface(): void
    {
        $requestResult = new MockedResultFixture(200, '');

        $this->assertInstanceOf(JsonRequestResultInterface::class, $requestResult);
    }

    /** @test */
    public function it_uses_json_request_result_trait(): void
    {
        $usedTraits = class_uses(MockedResultFixture::class);

        $this->assertArrayHasKey(JsonRequestResultTrait::class, $usedTraits);
    }

    /** @test */
    public function it_can_set_response_body()
    {
        $requestResult = new MockedResultFixture(200, '');
        $this->assertSame('', $requestResult->getResponseBody());

        $requestResult->setResposeBody('hello!');
        $this->assertSame('hello!', $requestResult->getResponseBody());
    }

    /** @test */
    public function it_will_decode_json_string_only_once()
    {
        $requestResult = new MockedResultFixture(200, '{"ping": true}');

        $this->assertSame('{"ping": true}', $requestResult->getResponseBody());
        $this->assertSame(['ping' => true], $requestResult->getJson());

        $requestResult->setResposeBody('{"ping": false}');
        $this->assertSame('{"ping": false}', $requestResult->getResponseBody());
        $this->assertSame(['ping' => true], $requestResult->getJson());
    }
}
