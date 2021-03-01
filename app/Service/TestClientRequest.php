<?php


namespace App\Service;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TestClientRequest implements ClientRequestInterface
{

    /**
     * Dummy response
     * @param $path
     * @return Response
     */
    public function makeRequest($path):Response
    {
        Http::fake([
            'test' => Http::response(['message' => 'Crashed at position 1,2', 'map' => '#   x   #\n### **###\n##   * ##'], 200)
        ]);

        return Http::get('test');
    }
}
