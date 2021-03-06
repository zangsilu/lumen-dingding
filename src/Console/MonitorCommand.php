<?php

/*
 * This file is part of the lumen dingding package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liugj\DingDing\Console;

use Illuminate\Console\Command;
use Liugj\DingDing\Facades\Ding;

class MonitorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ding:monitor {filename}';

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
        $filename = $this->argument('filename');
        $seekfile = sprintf('%s.seek', $filename);
        $content = \Liugj\Helpers\file_inc($filename, $seekfile);

        if ($content) {
            Ding :: sendText($content, []);
            info(self ::class . 'send dingding ok.');
        }
    }
}
