<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_SuggestionsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->slug = '';
        $this->lang = null;
        $this->id = '';
        $this->count = '';
        $this->sinceId = '';
        $this->maxId = '';
    }

    public function testGetCategory()
    {
        $getCategory = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getCategory($this->slug, $this->lang);
        $this->assertArrayHasKey('id', $getCategory);
    }

    public function testGetFavorites()
    {
        $getFavorites = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getFavorites($this->id);
        $this->assertArrayHasKey('id', $getFavorites[0]);
    }

    public function testGetUserByStatus()
    {
        $getUserByStatus = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getUserByStatus($this->slug);
        $this->assertArrayHasKey('id', $getUserByStatus[0]);
    }

    public function testSetCount()
    {
        $count = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $count);
    }

    public function testSetSinceId()
    {
        $since = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId($this->sinceId);
        $this->assertObjectHasAttribute('query', $since);
    }

    public function testSetMaxId()
    {
        $max = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMaxId($this->maxId);
        $this->assertObjectHasAttribute('query', $max);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }
}
