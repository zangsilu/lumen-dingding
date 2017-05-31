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
     * message.
     *
     * @var mixed
     */
    public $message;

    /**
     * __construct.
     *
     * @param Liugj\DingDing\Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
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
        return $dinger->send($this->message);
    }
}
