<?php

namespace Document\Document;

use Nowakowskir\JWT\TokenDecoded;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


/**
 * Class Document
 * @package Document\Document
 */
class Document
{
    /**
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function verify(string $email, string $firstName, string $lastName, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://sumsub.crpt.trading/doc/create', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                "email" => $email,
                "firstName" => $firstName,
                "lastName" => $lastName
            ]
        ]);

        return $response->toArray();
    }
}