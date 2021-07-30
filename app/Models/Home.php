<?php

namespace App\Models;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    /**
     * Get token from Meli API
     * @param $client
     * @param $code
     * @return null
     * @throws Exception
     */
    private function getToken($client, $code)
    {
        try {
            $body = [
                'code' => $code,
                'client_id' => env('MP_APP_ID'),
                'client_secret' => env('MP_CLIENT_SECRET'),
                'redirect_uri' => env('MP_REDIRECT_URI'),
                'grant_type' => 'authorization_code'
            ];

            $response = $client->post(env('MP_URL_GET_TOKEN'), ['form_params' => $body]);

            return json_decode($response->getBody()->getContents())->access_token ?? null;
        } catch (Exception $exception) {
            throw new Exception("Invalid token");
        }
    }

    /**
     * Get 10 A/C products from Meli order desc by price
     * @param $code
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProducts($code)
    {
        if (!$code) {
            throw new \Exception('Invalid code');
        }
        $client = new Client();
        $token = $this->getToken($client, $code);
        if (!$token) {
            throw new \Exception('Invalid token');
        }
        #A/C CODE, ODER BY PRICE DESC & LIMIT 10 RESULTS
        $filter = "MLA/search?category=MLA1644&sort=price_desc&limit=10";
        $response = $client->get(env('MP_URL_GET_PRODUCTS') . $filter, ['Authorization' => "Bearer " . $token]);

        return json_decode($response->getBody()->getContents())->results;
    }
}
