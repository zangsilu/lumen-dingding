<?php

/*
 * This file is part of the lumen dingding package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liugj\DingDing\Contracts;

interface Dingable
{
    public function send(Dinger $dinger);
}
