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

class Text extends Message
{
    /**
     * content.
     *
     * @var mixed
     */
    public $content;
    /**
     * at.
     *
     * @var mixed
     */
    public $at;

    /**
     * __construct.
     *
     * @param sting $content
     * @param array $at
     *
     * @return mixed
     */
    public function __construct(string $content, array $at=[])
    {
        parent :: __construct('text');
        $this->setContent($content)->setAt($at);
    }

    /**
     * setContent.
     *
     * @param mixed $content
     *
     * @return mixed
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * setAt.
     *
     * @param array $at
     *
     * @return mixed
     */
    public function setAt(array $at)
    {
        $this->at = $at;

        return $this;
    }

    /**
     * {
     * "msgtype": "text",
     * "text": {
     *     "content": "我就是我, 是不一样的烟火"
     * },
     * "at": {
     *    "atMobiles": [
     *        "156xxxx8827",
     *        "189xxxx8325"
     *    ],
     *    "isAtAll": false
     * }
     *  }.
     */
    public function __toString()
    {
        return json_encode(['msgtype' => $this->msgType, 'text' => ['content' => $this->content], 'at' => $this->at]);
    }
}
