<?php

/*
 * This file is part of the lumen dingding package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liugj\DingDing\Message;

use Liugj\DingDing\Message;

class MarkDown extends Message
{
    /**
     * title.
     *
     * @var mixed
     */
    public $title;
    /**
     * text.
     *
     * @var mixed
     */
    public $text;

    /**
     * __construct.
     *
     * @param string $title
     * @param string $text
     *
     * @return mixed
     */
    public function __construct(string $title, string $text)
    {
        parent :: __construct('markdown');
        $this->setTitle($title)->setText($text);
    }

    /**
     * setText.
     *
     * @param string $text
     *
     * @return mixed
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * setTitle.
     *
     * @param string $title
     *
     * @return mixed
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {
     *  "msgtype": "markdown",
     *  "markdown": {
     *      "title":"杭州天气",
     *      "text": "#### 杭州天气\n" +
     *              "> 9度，西北风1级，空气良89，相对温度73%\n\n" +
     *              "> ![screenshot](http://image.jpg)\n"  +
     *              "> ###### 10点20分发布 [天气](http://www.thinkpage.cn/) \n"
     *  }
     *  }.
     */
    public function __toString()
    {
        return json_encode(['msgtype' => $this->msgType,
                           'markdown' => ['title' => $this->title, 'text' => $this->text],
                        ]);
    }
}
