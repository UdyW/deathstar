<?php


namespace App\Service;


interface ClientRequestInterface
{
    public function makeRequest($path);
}
