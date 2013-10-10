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
        $this->consumerKey = 'QwgkQh3AiloLxQ9PcjqNgA';
        $this->consumerSecret = 'LNOxfFGIWTzlKSpL23qY28kxLxfwfKBDW3vh1BSw4M';

        $this->accessToken = '21862667-Prmb3MOGBqFhqtjf2AlHDcq8MwdSocE4t2i1k3DBB';
        $this->accessSecret = 'jTAEUuy9cSinM5UdAeh345RCjoy0dA7JtYsqzBj9M0';

        $this->messageId = '377822016369201152';
        $this->id = 'ricocomonster';
        $this->text = 'unit testing api';
        $this->count = 5;
        $this->maxId = '384625453299806208';
        $this->page = '2';
        $this->sinceId = '384625453299806208';
        $this->wrap = true;
    }

    public function testGetList()
    {
        // $list = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->getList();
        // $this->assertTrue('Eden\\Twitter\\Directmessage', !isset($list['errors']));
    }

    public function testGetSent()
    {
        // $sent = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->getSent();
        // $this->assertTrue('Eden\\Twitter\\Directmessage', !isset($sent['errors']));
    }

    public function testGetDetail()
    {
        // $detail = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->getDetail($this->messageId);
        // $this->assertTrue('Eden\\Twitter\\Directmessage', !isset($detail['errors']));
    }

    public function testRemove()
    {
        // $remove = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->remove($this->id);
        // print_r($remove);
        // $this->assertTrue('Eden\\Twitter\\Directmessage', !isset($remove['errors']));
    }

    public function testSend()
    {
        // $send = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->send($this->id, $this->text);
        // $this->assertTrue('Eden\\Twitter\\Directmessage', !isset($send['errors']));
    }

    public function testIncludeEntities()
    {
        // $entities = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->includeEntities();
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $entities);
    }

    public function testSetCount()
    {
        // $count = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->setCount($this->count);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $count);
    }

    public function testSetMaxId()
    {
        // $maxId = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->setMaxId($this->count);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $maxId);
    }

    public function testSetPage()
    {
        // $page = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->setPage($this->page);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $page);
    }

    public function testSetSinceId()
    {
        // $since = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->setSinceId($this->sinceId);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $since);
    }

    public function testSetWrap()
    {
        // $wrap = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->setWrap($this->wrap);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $wrap);
    }

    public function testSkipStatus()
    {
        // $skip = eden('twitter')
        //     ->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
        //     ->skipStatus($this->count);
        // $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $skip);
    }
}
