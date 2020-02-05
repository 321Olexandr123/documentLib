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
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function verify(string $email, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'https://doc.crpt.trading/doc/create', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                "email" => $email
            ]
        ]);

        return $response->toArray();
    }
}