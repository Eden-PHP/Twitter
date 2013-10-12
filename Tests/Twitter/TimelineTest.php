<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_TimelineTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '';
        $this->sinceId = 1;
        $this->count = 1;
        $this->maxId = 1;
    }

    public function testGetMentionTimeline()
    {
        $getMention = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getMentionTimeline();
        $this->assertArrayHasKey('id', $getMention[0]);
    }

    public function testGetUserTimelines()
    {
        $getUserTimeline = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getUserTimelines($this->id);
        $this->assertArrayHasKey('id', $getUserTimeline[0]);
    }

    public function testGetYourTimeLine()
    {
        $yourTimeline = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getYourTimeLine();
        $this->assertArrayHasKey('id', $yourTimeline[0]);
    }

    public function testSetSinceId()
    {
        $sinceId = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId($this->sinceId);
        $this->assertObjectHasAttribute('query', $sinceId);
    }

    public function testSetCount()
    {
        $count = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount($this->count);
        $this->assertObjectHasAttribute('query', $count);
    }

    public function testSetMaxId()
    {
        $maxId = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMaxId($this->maxId);
        $this->assertObjectHasAttribute('query', $maxId);
    }

    public function testTrimUser()
    {
        $trimUser = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->trimUser();
        $this->assertObjectHasAttribute('query', $trimUser);
    }

    public function testExcludeReplies()
    {
        $exclude = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->excludeReplies();
        $this->assertObjectHasAttribute('query', $exclude);
    }

    public function testSetContributorDetails()
    {
        $contributor = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setContributorDetails();
        $this->assertObjectHasAttribute('query', $contributor);
    }

    public function testIncludeRts()
    {
        $rts = eden('twitter')
            ->timeline($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeRts();
        $this->assertObjectHasAttribute('query', $rts);
    }
}
