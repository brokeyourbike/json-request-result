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
trait JsonRequestResultTrait
{
    private int $statusCode;

    private string $responseBody;

    /**
     * @var array<mixed>|null
     */
    private ?array $json = null;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    /**
     * @return array<mixed>|null
     */
    public function getJson(): ?array
    {
        if ($this->json !== null) {
            return $this->json;
        }

        /** @var mixed $decoded */
        $decoded = \json_decode($this->responseBody, true);

        if (is_array($decoded)) {
            $this->json = $decoded;
        }

        return $this->json;
    }
}
