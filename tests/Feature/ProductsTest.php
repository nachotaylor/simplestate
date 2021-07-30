<?php

namespace Tests\Feature;

use App\Models\Home;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Get home page OK
     */
    public function testGetHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertOk();
    }

    /**
     * Send invalid token and expect exception with message 'Invalid token'
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetProductsExceptionInvalidToken()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid token');
        $code = "TG-610341d23506ce0008215bfa-426529081";
        $home = new Home();
        $home->getProducts($code);
    }

    /**
     * * Send invalid Meli code and expect exception with message 'Invalid code'
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetProductsExceptionInvalidCode()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid code');
        $code = null;
        $home = new Home();
        $home->getProducts($code);
    }
}
