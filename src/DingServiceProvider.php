<?php

/*
 * This file is part of the lumen dingding package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liugj\DingDing;

use Illuminate\Support\ServiceProvider;
use Liugj\DingDing\Console\MonitorCommand;

class DingServiceProvider extends ServiceProvider
{
    /**
     * defer.
     *
     * @var mixed
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('dinger', function ($app) {
            $app->configure('ding');
            $config = $app->make('config')->get('ding');

            return new Dinger($config);
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                    MonitorCommand::class,
            ]);
        }
    }

    public function provides()
    {
        return ['dinger'];
    }
}
