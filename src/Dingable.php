<?php

/*
 * This file is part of the openapi package.
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
     * content 
     * 
     * @var mixed
     * @access public
     */
    public $content;

    /**
     * __construct 
     * 
     * @param string $content 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * send 
     * 
     * @param DingerContract $dinger 
     * 
     * @access public
     * 
     * @return mixed
     */
    public function send(DingerContract $dinger)
    {
        $dinger->send($this->content);
    }
}
