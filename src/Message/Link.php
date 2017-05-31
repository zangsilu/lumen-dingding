<?php

/*
 * This file is part of the openapi package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liugj\DingDing\Message;

use Liugj\DingDing\Message;

class Link extends Message
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
     * picUrl.
     *
     * @var mixed
     */
    public $picUrl;
    /**
     * messageUrl.
     *
     * @var mixed
     */
    public $messageUrl;

   /*
    * {
    * "msgtype": "link",
    * "link": {
    *     "text": "这个即将发布的新版本，创始人陈航（花名“无招”）称它为“红树林”。
而在* 此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是“红树林”？",
    *     "title": "时代的火车向前开",
    *     "picUrl": "",
    *     "messageUrl": "https://mp.weixin.qq.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI"
    *  }
    *  }
    */
    public function __toString()
    {
        return json_encode(['msgtype' => $this->msgType,
                            'link' => [
                                  'title' => $this->title,
                                  'text' => $this->text,
                                  'picUrl' => $this->picUrl,
                                  'messageUrl' => $this->messageUrl,
                                  ],
                            ]);
    }

    /**
     * __construct.
     *
     * @param sting  $text
     * @param string $title
     * @param string $picUrl
     * @param string $messageUrl
     *
     * @return mixed
     */
    public function __construct(sting $text, string $title, string $picUrl, string $messageUrl)
    {
        parent :: __construct('link');
        $this->setTitle($title)->setText($text)->setPicUrl($picUrl)->setMessageUrl($messageUrl);
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
     * setPicUrl.
     *
     * @param string $picUrl
     *
     * @return mixed
     */
    public function setPicUrl(string $picUrl)
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    /**
     * setMessageUrl.
     *
     * @param string $messageUrl
     *
     * @return mixed
     */
    public function setMessageUrl(string $messageUrl)
    {
        $this->messageUrl = $messageUrl;

        return $this;
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
}
