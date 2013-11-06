<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_FavoritesTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '';
        $this->count = '1';
        $this->sinceId = '';
        $this->maxId = '';
        $this->page = '1';
    }

    public function testAddFavorites()
    {
        $favorites = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->addFavorites($this->id);
        $this->assertArrayHasKey('user', $favorites);
    }

    public function testGetList()
    {
        $list = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getList();
        $this->assertArrayHasKey('user', $list[0]);
    }

    public function testRemove()
    {
        $remove = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->remove($this->id);
        $this->assertArrayHasKey('id', $remove);
    }

    public function testSetUserId()
    {
        $userId = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setUserId($this->id);

        $this->assertObjectHasAttribute('query', $userId);
    }

    public function testSetCount()
    {
        $count = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $count);
    }

    public function testSetSinceId()
    {
        $since = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId($this->sinceId);
        $this->assertObjectHasAttribute('query', $since);
    }

    public function testSetMaxId()
    {
        $max = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMaxId($this->maxId);
        $this->assertObjectHasAttribute('query', $max);
    }

    public function testSetPage()
    {
        $page = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPage($this->page);
        $this->assertObjectHasAttribute('query', $page);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities($this->count);
        $this->assertObjectHasAttribute('query', $entities);
    }
}
