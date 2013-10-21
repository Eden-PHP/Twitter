<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_DirectmessageTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->messageId = '';
        $this->id = '';
        $this->text = '';
        $this->count = 0;
        $this->maxId = '';
        $this->page = '';
        $this->sinceId = '';
        $this->wrap = true;
    }

    public function testGetList()
    {
        $list = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getList();
        $this->assertArrayHasKey('id', $list[0]);
    }

    public function testGetSent()
    {
        $sent = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getSent();
        $this->assertArrayHasKey('id', $sent[0]);
    }

    public function testGetDetail()
    {
        $detail = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getDetail($this->messageId);
        $this->assertArrayHasKey('id', $detail);
    }

    public function testRemove()
    {
        $remove = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->remove($this->messageId);
        $this->assertArrayHasKey('sender_id_str', $remove);
    }

    public function testSend()
    {
        $send = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->send($this->id, $this->text);
        $this->assertArrayHasKey('sender_id', $send);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }

    public function testSetCount()
    {
        $count = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $count);
    }

    public function testSetMaxId()
    {
        $maxId = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMaxId($this->count);
        $this->assertObjectHasAttribute('query', $maxId);
    }

    public function testSetPage()
    {
        $page = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPage($this->page);
        $this->assertObjectHasAttribute('query', $page);
    }

    public function testSetSinceId()
    {
        $since = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId($this->sinceId);
        $this->assertObjectHasAttribute('query', $since);
    }

    public function testSetWrap()
    {
        $wrap = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setWrap($this->wrap);
        $this->assertObjectHasAttribute('query', $wrap);
    }

    public function testSkipStatus()
    {
        $skip = eden('twitter')
            ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->skipStatus($this->count);
        $this->assertObjectHasAttribute('query', $skip);
    }
}
