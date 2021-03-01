<?php


namespace App\Service;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LiveClientRequest implements ClientRequestInterface
{
    /**
     * Returen response from real api call
     * @param $path
     * @return Response
     */
    public function makeRequest($path):Response
    {
        return Http::get('https://deathstar.dev-tests.vp-ops.com/empire.php?name=udy&path='.$path);
    }
}
