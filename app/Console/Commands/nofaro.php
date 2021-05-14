<?php

namespace App\Console\Commands;

use App\Http\Controllers\HashController;
use Illuminate\Console\Command;


class nofaro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nofaro:test {string} {--r|request}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command para gerar hash';

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
        $request = $this->ask('Número de requisições:');
        $string = $this->argument('string');
        $class_hash = new HashController();
        $hash = $class_hash->gerarHash($string);
        $tentativas = 1;
//      $this->info($hash);
        if($request <= 10){
            for($i=0;$i<($request-1);$i++){
                while(substr($hash,0,4) != "0000"){
                    $class_hash = new HashController();
                    $hash = $class_hash->gerarHash($string);
                    $tentativas++;
//                  $this->info($hash);
                }
            }
        }
        else{
            for($i=0;$i<10;$i++){
                while(substr($hash,0,4) != "0000"){
                    $class_hash = new HashController();
                    $hash = $class_hash->gerarHash($string);
                    $tentativas++;
//                    $this->info($hash);
                }
            }
            $this->error("Too many Attempts.");
        }
        $this->info("Numero de tentativas: ".$tentativas);
    }
}
