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

namespace U2FAuthentication\Fido2;

class AuthenticatorAssertionResponse extends AuthenticatorResponse
{
    /**
     * @var string
     */
    private $authenticatorData;

    /**
     * @var string
     */
    private $signature;

    /**
     * @var null|string
     */
    private $userHandle;

    /**
     * AuthenticatorAssertionResponse constructor.
     *
     * @param string $clientDataJSON
     * @param string $authenticatorData
     * @param string $signature
     * @param string $userHandle
     */
    public function __construct(string $clientDataJSON, string $authenticatorData, string $signature, string $userHandle)
    {
        parent::__construct($clientDataJSON);
        $this->authenticatorData = $authenticatorData;
        $this->signature = $signature;
        $this->userHandle = $userHandle;
    }

    /**
     * @return string
     */
    public function getAuthenticatorData(): string
    {
        return $this->authenticatorData;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @return null|string
     */
    public function getUserHandle(): ?string
    {
        return $this->userHandle;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        $json = [
            'clientDataJSON'    => $this->getClientDataJSON(),
            'authenticatorData' => $this->authenticatorData,
            'signature'         => $this->signature,
        ];
        if ($this->userHandle) {
            $json['userHandle'] = $this->userHandle;
        }

        return $json;
    }
}
