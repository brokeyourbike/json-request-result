<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Tests\JsonRequestResult;

use BrokeYourBike\JsonRequestResult\JsonRequestResultTrait;
use BrokeYourBike\JsonRequestResult\JsonRequestResultInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class MockedResultFixture implements JsonRequestResultInterface
{
    use JsonRequestResultTrait;

    public function __construct(int $statusCode, string $body)
    {
        $this->statusCode = $statusCode;
        $this->responseBody = $body;
    }

    public function setResposeBody(string $body)
    {
        $this->responseBody = $body;
    }
}
