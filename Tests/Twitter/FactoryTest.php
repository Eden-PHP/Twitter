<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_FactoryTest extends \PHPUnit_Framework_TestCase
{

    public function setUp() {
        $this->key = '';
        $this->secret = '';

        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';
    }

    public function testAuth()
    {
        $class = eden('twitter')->auth($this->key, $this->secret);
        $this->assertInstanceOf('Eden\\Twitter\\Oauth', $class);
    }

    public function testDirectMessage()
    {
        $class = eden('twitter')->directMessage($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Directmessage', $class);
    }

    public function testFavorites()
    {
        $class = eden('twitter')->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Favorites', $class);
    }

    public function testFriends()
    {
        $class = eden('twitter')->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Friends', $class);
    }

    public function testGeo()
    {
        $class = eden('twitter')->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Geo', $class);
    }

    public function testHelp()
    {
        $class = eden('twitter')->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Help', $class);
    }


    public function testLists()
    {
        $class = eden('twitter')->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Lists', $class);
    }

    public function testSaved()
    {
        $class = eden('twitter')->saved($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Saved', $class);
    }

    public function testSearch()
    {
        $class = eden('twitter')->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Search', $class);
    }

    public function testSpam()
    {
        $class = eden('twitter')->spam($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Spam', $class);
    }

    public function testStreaming()
    {
        $class = eden('twitter')->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Streaming', $class);
    }

    public function testSuggestions()
    {
        $class = eden('twitter')->suggestions($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Suggestions', $class);
    }

    public function testTimeline()
    {
        $class = eden('twitter')->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Timeline', $class);
    }

    public function testTrends()
    {
        $class = eden('twitter')->trends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Trends', $class);
    }

    public function testTweets()
    {
        $class = eden('twitter')->tweets($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Tweets', $class);
    }

    public function testUsers()
    {
        $class = eden('twitter')->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret);
        $this->assertInstanceOf('Eden\\Twitter\\Users', $class);
    }
}
