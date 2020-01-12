<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

require __DIR__ . '/../../../vendor/autoload.php';
include __DIR__ . '/../../Bundle.php';

class CustomerApiTest extends TestCase
{
    private const BASE_URL = 'http://localhost/web/index.php/customer';

    public function testGetCustomer()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::BASE_URL . '/1');
        $content = json_decode($response->getContent(), true);

        $headers = $response->getHeaders();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($headers['content-type'][0], 'application/json');

        $this->assertEquals($content['name'], 'Oscar');
        $this->assertEquals($content['email'], 'oscar.gallardo@outlook.com');
        $this->assertEquals($content['status'], 'Registered');
        $this->assertEquals($content['country'], 'Germany');
        $this->assertEquals($content['address'], 'Osloer 57');
        $this->assertEquals($content['postal_code'], '10825');
    }

    public function testPostCustomer()
    {
        $body = '{
            "name": "Oscar",
            "email": "oscar.gallardo@outlook.com",
            "status": "Registered",
            "country": "Germany",
            "address": "Osloer 57",
            "postal_code": "10825"
        }';
        $client = HttpClient::create();
        $response = $client->request('POST', self::BASE_URL, ['body' => $body]);
        $content = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($content['status'], 'ok');
    }

    public function testPutCustomer()
    {
        $body = '{
            "name": "OscarD",
            "email": "oscar.gallardo@hotmail.com",
            "status": "Registered",
            "country": "Germany",
            "address": "Osloer 57"
        }';
        $client = HttpClient::create();
        $response = $client->request('PUT', self::BASE_URL . '/1', ['body' => $body]);
        $content = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($content['status'], 'ok');
    }

    public function testDelCustomer()
    {
        $client = HttpClient::create();
        $response = $client->request('DELETE', self::BASE_URL . '/2');
        $content = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($content['status'], 'ok');
    }
}