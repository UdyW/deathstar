<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

test('navigate command', function () {
    Config::set('app.env', 'test');

//    $this->artisan('navigate')
//        ->expectsOutput('fffrffffflfffffffffffffffffffffffffffffffffffflffffffffffffffffffffffffffffffffffffffffffrfrfffffffffflffffflffffffffffffflffffrfrfrfffffffffffffflffllffffffffrffffffffffffffrffffffffflfffffffffffffffffffffffffffffflfffffrfrfffrffffffffffffrffflflfffflflfffffffrfffffflffrfrffffllffffffrffrfrffffffffffrffllfffrfffflfffffffllffffffffffffffffffffrfrfffffrffffflfffffffffffffffffffffflfffflfffffffffffffffffffffrfrffrfffffffffffffflfffffffflfflfffffrffrfffllffffrfrfrfffffffffffffflflflffffffffffffffffffrffflffrffffffffffffffffffffffffrfrfffrfffffflffffffffffffffffffffffff');
//    expect(true)->toBeTrue();

    $this->artisan('navigate')
        ->expectsOutput('ff');
    expect(true)->toBeTrue();
});
