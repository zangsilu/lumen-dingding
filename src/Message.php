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

abstract class Message
{
    public $msgType;

    public function __construct($msgType)
    {
        $this->msgType = $msgType;
    }

    abstract public function __toString();
}
