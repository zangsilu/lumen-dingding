<?php 
namespace Liugj\DingDing\Console;

use Illuminate\Console\Command;
use Liugj\DingDing\Facedes\Dinger;

class MonitorCommand extends Command
{
    /** 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ding:notice {model}';

    /**
     * The console command description.
     *   
     * @var string
     */  
    protected $description = '发送钉钉报警';

    /**
     * Execute the console command.
     *   
     * @return void
     */  
    public function handle()
    { 
        $class = $this->argument('model');
        $model =  new $class;
        Dinger :: sendText($model);
    }
}
