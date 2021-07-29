<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    private function getToken($client, $code)
    {
        $body = [
            'code' => $code,
            'client_id' => env('MP_APP_ID'),
            'client_secret' => env('MP_CLIENT_SECRET'),
            'redirect_uri' => env('MP_REDIRECT_URI'),
            'grant_type' => 'authorization_code'
        ];

        $response = $client->post(env('MP_URL_GET_TOKEN'), ['form_params' => $body]);

        return json_decode($response->getBody()->getContents())->access_token ?? null;
    }

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
