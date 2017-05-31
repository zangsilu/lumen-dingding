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

use Liugj\DingDing\Contracts\Dingable as DingableContract;
use Liugj\DingDing\Contracts\Dinger as DingerContract;

class Dingable implements DingableContract
{
    /**
     * content.
     *
     * @var mixed
     */
    public $content;

    /**
     * __construct.
     *
     * @param string $content
     *
     * @return mixed
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * send.
     *
     * @param DingerContract $dinger
     *
     * @return mixed
     */
    public function send(DingerContract $dinger)
    {
        $dinger->send($this->content);
    }
}
