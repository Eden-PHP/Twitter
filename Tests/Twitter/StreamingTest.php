<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_StreamingTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->count = 1;
        $this->follow = '';
        $this->track = '';
        $this->locations = '';
    }

    public function testStreamPublicStatus()
    {
        $publicStatus = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamPublicStatus();
    }

    public function testStreamRandomStatus()
    {
        $randomStatus = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamRandomStatus();
    }

    public function testFireHose()
    {
        $fireHose = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->fireHose();
    }

    public function testStreamMessage()
    {
        $streamMessasge = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamMessage();
    }

    public function testStreamSite()
    {
        $streamSite = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamSite();
    }

    public function testStreamWithFollowings()
    {
        $streamWithFollowings = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamWithFollowings();
        $this->assertObjectHasAttribute('query', $streamWithFollowings);
    }

    public function testStreamWithReplies()
    {
        $streamWithReplies = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->streamWithReplies();
        $this->assertObjectHasAttribute('query', $streamWithReplies);
    }

    public function testSetCount()
    {
        $setCount = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $setCount);
    }

    public function testSetFollow()
    {
        $setFollow = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setFollow($this->follow);
        $this->assertObjectHasAttribute('query', $setFollow);
    }

    public function testSetTrack()
    {
        $setTrack = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setTrack($this->track);
        $this->assertObjectHasAttribute('query', $setTrack);
    }

    public function testSetLocation()
    {
        $setLocation = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLocation($this->locations);
        $this->assertObjectHasAttribute('query', $setLocation);
    }

    public function testSetDelimited()
    {
        $setDelimited = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setDelimited();
        $this->assertObjectHasAttribute('query', $setDelimited);
    }

    public function testSetStallWarning()
    {
        $setStallWarning = eden('twitter')
            ->streaming($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setStallWarning();
    }
}
