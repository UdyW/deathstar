<?php

namespace App\Commands;

use App\Service\ClientRequestInterface;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Navigate extends Command
{
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
     * @param ClientRequestInterface $request
     * @return mixed
     */
    public function handle(ClientRequestInterface $request):void
    {
        $path = 'f'; //first move forward
        $responseCode = 0;
        $currPos = 4; //starting x coordinate

        $this->output->progressStart(0); //initiate progressbar

        //loop through untill 200 status code returns
        while($responseCode !== 200){
            $this->output->progressAdvance();
            $response = $request->makeRequest($path); //make request to API
            $array = explode(PHP_EOL, $response->json()['map']); //reading map
            $responseCode = $response->status(); //get status code

            if($responseCode === 417) { //handle crash
                //checking available positions in the last array element i.e last step of the map
                $movablePos = strpos(end($array), ' ');

                //if the position is less that current position move to left, else move to right
                $path = substr($path,0, -1);
                if ($movablePos < $currPos) {
                    $path .= 'lf';
                    $currPos--;
                } else {
                    $path .= 'rf';
                    $currPos++;
                }
            }
            else { //not 417 means we can move forward
                $path .= 'f';
            }
        }
        $this->output->progressFinish();
        //return path
        $this->info($path);
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
