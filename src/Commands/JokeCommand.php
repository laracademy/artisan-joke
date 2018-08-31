<?php

namespace Laracademy\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class JokeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'joke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'We all need a little pick me up sometimes, this package will tell you a random joke.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://icanhazdadjoke.com', [
            'headers' => [
                'Accept' => 'text/plain',
            ],
        ]);

        if($response->getStatusCode() != 200) {
            $this->error('Cannot contact joke API');
            return;
        }

        $this->info((string)$response->getBody());
    }
}
