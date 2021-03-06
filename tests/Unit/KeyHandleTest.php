<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace U2FAuthentication\Tests\Unit;

use PHPUnit\Framework\TestCase;
use U2FAuthentication\Fido\KeyHandle;

/**
 * @group Unit
 */
final class KeyHandleTest extends TestCase
{
    /**
     * @test
     */
    public function aKeyHandleCanBeCreatedAndSerialized()
    {
        $handle = KeyHandle::create(
            'foo'
        );

        self::assertEquals('foo', $handle->getValue());
        self::assertEquals('foo', $handle->jsonSerialize());
        self::assertEquals('foo', $handle->__toString());
    }
}
