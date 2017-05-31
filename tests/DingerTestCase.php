<?php

/*
 * This file is part of the lumen dingding package.
 *
 * (c) liugj <liugj@boqii.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Liugj\DingDing\Dinger;
use PHPUnit\Framework\TestCase;

class DingerTestCase extends TestCase
{
    public $dinger = null;

    public function setUp()
    {
        $this->dinger = new Dinger(['access_token' => '70f5caa93c4704c4c16c236efbeab96340e64db19eeca2e3b6831cbd415d8104']);
    }

    //public function testSendText()
    //{
    //    $message['msgtype'] = "text";
    //    $message ["text"]['content'] = '我就是我, 是不一样的烟火';
    //    $code = $dinger  ->send(json_encode($message));
    //    $this->assertEquals($code, 0);
    //}
    public function testSendLink()
    {
        //string $text, string $title, string $picUrl, string $messageUrl
        $title = '北京二手房价大面积下跌 部分区域跌幅超20%';
        $text = '北京二手房价大面积下跌 部分区域跌幅超20%';
        $messageUrl = 'http://finance.qq.com/a/20170531/002698.htm?pgv_ref=aio2015&ptlang=2052';
        $picUrl = 'http://inews.gtimg.com/newsapp_ls/0/1600719838/0';
        $code = $this->dinger->sendLink($text, $title, $picUrl, $messageUrl);
        $this->assertEquals($code, 0);
    }

    public function testSendMardown()
    {
        //string $text, string $title, string $picUrl, string $messageUrl
        $title = '北京二手房价大面积下跌 部分区域跌幅超20%';
        $text = "## 有序列表\n"
             .'1. item1'
             .'2. item2';
        $code = $this->dinger->sendMarkdown($text, $title);
        $this->assertEquals($code, 0);
    }
}
