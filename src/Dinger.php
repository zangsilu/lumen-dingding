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

use GuzzleHttp\Client as GuzzleHttpClient;
use Liugj\DingDing\Contracts\Dinger as DingerContract;

class Dinger implements DingerContract
{
    /**
     * options.
     *
     * @var mixed
     */
    public $options;

    /**
     * __construct.
     *
     * @param array $options
     *
     * @return mixed
     */
    public function __construct(array $options = [])
    {
        $default = [
                  'timeout' => 5,
                  'base_uri' => 'https://oapi.dingtalk.com/',
                  ];
        $this->options = $options + $default;
    }

    /**
     * send.
     *
     * @param string $message
     *
     * @return mixed
     */
    public function send(string $message)
    {
        $response = (new GuzzleHttpClient($this->options))->request(
              'post',
              '/robot/send?access_token='. $this->options['access_token'],
              ['body' => $message, 'headers' => ['Content-Type' => 'application/json;charset=utf-8']]
             );
        if ($response->getStatusCode() != 200) {
            throw new \Exception($response->getReasonPhrase(), $response->getStatusCode());
        }
        $json = json_decode((string) $response->getBody());
        if ($json->errcode != 0) {
            throw new \Exception($json->errmsg, $json->errcode);
        }

        return $json->errcode;
    }

    /**
     * sendText.
     *
     * @param string $text
     * @param array  $at
     * @param bool   $isAtAll
     *
     * @return mixed
     */
    public function sendText(string $text, array $at, bool $isAtAll = true)
    {
        return $this->send(new Message\Text($text, $at, $isAtAll));
    }
    
    /**
     * 发送错误日志邮件
     * @param string $content
     * @param string $to
     */
    public function sendMail(string $content,string $to)
    {
        if ($content) {
            Mail::raw($content, function ($message) use ($to) {
                $message->to(explode(',', $to))
                    ->subject('[ '.env('APP_ENV') .  ' ] [ 报警 ] openapi-petstore错误日志');
            });
            info('send php error mail to '. $to . ' ok.');
        };
    }

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
    public function sendLink(string $text, string $title, string $picUrl, string $messageUrl)
    {
        return $this->send(new Message\Link($text, $title, $picUrl, $messageUrl));
    }

    /**
     * sendMarkdown.
     *
     * @param string $text
     * @param string $title
     *
     * @return mixed
     */
    public function sendMarkdown(string $text, string $title)
    {
        return $this->send(new Message\Markdown($text, $title));
    }
}
