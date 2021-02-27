<?php

namespace App\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\Http;

class Navigate extends Command
{

    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct();
    }

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'navigate';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle():void
    {
        $path = 'f';
        $responseCode = 0;
        $currPos = 4;
        while($responseCode !== 200){
            $response =  Http::get('https://deathstar.dev-tests.vp-ops.com/empire.php?name=udy&path='.$path);
            $array = explode(PHP_EOL, $response->json()['map']);
            $responseCode = $response->status();
            if($responseCode === 417) {
                $movablePos = strpos(end($array), ' ');
                $path = substr($path,0, -1);
                if ($movablePos < $currPos) {
                    $path .= 'lf';
                    $currPos--;
                } else {
                    $path .= 'rf';
                    $currPos++;
                }
            }
            else {
                $path .= 'f';
            }
        }

//        $this->info('fffrffffflfffffffffffffffffffffffffffffffffffflffffffffffffffffffffffffffffffffffffffffffrfrfffffffffflffffflffffffffffffflffffrfrfrfffffffffffffflffllffffffffrffffffffffffffrffffffffflfffffffffffffffffffffffffffffflfffffrfrfffrffffffffffffrffflflfffflflfffffffrfffffflffrfrffffllffffffrffrfrffffffffffrffllfffrfffflfffffffllffffffffffffffffffffrfrfffffrffffflfffffffffffffffffffffflfffflfffffffffffffffffffffrfrffrfffffffffffffflfffffffflfflfffffrffrfffllffffrfrfrfffffffffffffflflflffffffffffffffffffrffflffrffffffffffffffffffffffffrfrfffrfffffflffffffffffffffffffffffff');
        $this->info($path);

//        $response =  Http::get('https://deathstar.dev-tests.vp-ops.com/empire.php?name=udy&path=fffrffffflfffffffffffffffffffffffffffffffffffflffffffffffffffffffffffffffffffffffffffffffrfrfffffffffflffffflffffffffffffflffffrfrfrfffffffffffffflffllffffffffrffffffffffffffrffffffffflfffffffffffffffffffffffffffffflfffffrfrfffrffffffffffffrffflflfffflflfffffffrfffffflffrfrffffllffffffrffrfrffffffffffrffllfffrfffflfffffffllffffffffffffffffffffrfrfffffrffffflfffffffffffffffffffffflfffflfffffffffffffffffffffrfrffrfffffffffffffflfffffffflfflfffffrffrfffllffffrfrfrfffffffffffffflflflffffffffffffffffffrffflffrffffffffffffffffffffffffrfrfffrfffffflffffffffffffffffffffffff');

    }

    /**
     * Define the command's schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
