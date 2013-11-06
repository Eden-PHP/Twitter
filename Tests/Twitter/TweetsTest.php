<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_TweetsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '';
        $this->removeId = '';
        $this->tweetId = '';
        $this->tweet = '';
        $this->media = array();
        $this->latitude = '';
        $this->longtitude = '';
        $this->placeId = '';
        $this->count = '';
    }

    public function testGetRetweet()
    {
        $retweet = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getRetweet($this->id);
        $this->assertArrayHasKey('id', $retweet[0]);
    }

    public function testGetTweet()
    {
        $tweet = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getTweet($this->id);
        $this->assertArrayHasKey('id', $tweet);
    }

    public function testRemoveTweet()
    {
        $remove = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->removeTweet($this->removeId);
        $this->assertArrayHasKey('id', $remove);
    }

    public function testTweet()
    {
        $tweet = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->tweet($this->tweet);
        $this->assertArrayHasKey('id', $tweet);
    }

    public function testRetweet()
    {
        $retweet = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->retweet($this->tweetId);
        $this->assertArrayHasKey('id', $retweet);
    }

    public function testTweetMedia()
    {
        $media = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->tweetMedia($this->status, $this->media);
        $this->assertArrayHasKey('id', $retweet);
    }

    public function testInReplyToStatusId()
    {
        $reply = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->inReplyToStatusId($this->id);
        $this->assertObjectHasAttribute('query', $reply);
    }

    public function testSetLatitude()
    {
        $latitude = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLatitude($this->latitude);
        $this->assertObjectHasAttribute('query', $latitude);
    }

    public function testSetLongtitude()
    {
        $longtitude = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLongtitude($this->longtitude);
        $this->assertObjectHasAttribute('query', $longtitude);
    }

    public function testSetPlaceId()
    {
        $setPlace = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPlaceId($this->placeId);
        $this->assertObjectHasAttribute('query', $setPlace);
    }

    public function testSetCount()
    {
        $setCount = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $setCount);
    }

    public function testDisplayCoordinates()
    {
        $coordinates = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->displayCoordinates();
        $this->assertObjectHasAttribute('query', $coordinates);
    }

    public function testTrimUser()
    {
        $trim = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->trimUser();
        $this->assertObjectHasAttribute('query', $trim);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }

    public function testIncludeMyRetweet()
    {
        $retweet = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeMyRetweet();
        $this->assertObjectHasAttribute('query', $retweet);
    }

    public function possiblySensitive()
    {
        $sensitive = eden('twitter')
            ->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->possiblySensitive();
        $this->assertObjectHasAttribute('query', $sensitive);
    }
}
