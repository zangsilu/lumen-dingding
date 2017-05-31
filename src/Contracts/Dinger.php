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

interface Dinger
{
    /**
     * sendText.
     *
     * @param string $text
     * @param array  $at
     * @param bool   $isAtAll
     *
     * @return mixed
     */
    public function sendText(string $text, array $at, bool $isAtAll = true);

    /**
     * sendLink.
     *
     * @param string $text
     * @param string $title
     * @param string $picUrl
     * @param string $messageUrl
     *
     * @return mixed
     */
    public function sendLink(string $text, string $title, string $picUrl, string $messageUrl);

    /**
     * sendMarkdown.
     *
     * @param string $text
     * @param string $title
     *
     * @return mixed
     */
    public function sendMarkdown(string $text, string $title);
}
