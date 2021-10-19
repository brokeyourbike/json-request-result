<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\JsonRequestResult;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
interface JsonRequestResultInterface
{
    /**
     * Returns response status code.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Returns response body.
     *
     * @return string
     */
    public function getResponseBody(): string;

    /**
     * Returns JSON response body decoded as array.
     *
     * @return array<mixed>|null
     */
    public function getJson(): ?array;
}
