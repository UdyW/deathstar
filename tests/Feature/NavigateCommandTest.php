<?php

use Illuminate\Support\Facades\Http;

test('navigate command', function () {
    Http::fake(['github.com/*' => Http::response(['foo' => 'bar'], 200)]);
    var_dump(Http::get('github.com/')->json());
//    $this->artisan('navigate')
//        ->expectsOutput('fffrffffflfffffffffffffffffffffffffffffffffffflffffffffffffffffffffffffffffffffffffffffffrfrfffffffffflffffflffffffffffffflffffrfrfrfffffffffffffflffllffffffffrffffffffffffffrffffffffflfffffffffffffffffffffffffffffflfffffrfrfffrffffffffffffrffflflfffflflfffffffrfffffflffrfrffffllffffffrffrfrffffffffffrffllfffrfffflfffffffllffffffffffffffffffffrfrfffffrffffflfffffffffffffffffffffflfffflfffffffffffffffffffffrfrffrfffffffffffffflfffffffflfflfffffrffrfffllffffrfrfrfffffffffffffflflflffffffffffffffffffrffflffrffffffffffffffffffffffffrfrfffrfffffflffffffffffffffffffffffff');
//    expect(true)->toBeTrue();
});
