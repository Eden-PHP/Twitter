<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_FriendsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '';
        $this->idFollower = '';
        $this->idFollowing = '';
        $this->notify = false;
        $this->targer = '';
        $this->entities = true;
        $this->device = false;
        $this->retweets = false;
        $this->cursor = '1';
    }

    public function testGetFollowing()
    {
        $following = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getFollowing($this->id);
        $this->assertArrayHasKey('ids', $following);
    }

    public function testGetFollowers()
    {
        $followers = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getFollowers($this->id);
        $this->assertArrayHasKey('ids', $following);
    }

    public function testFollow()
    {
        $follow = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->follow($this->idFollower, $this->notify);
        $this->assertArrayHasKey('id', $follow);
    }

    public function testGetPendingFollowing()
    {
        $pendingFollowing = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getPendingFollowing();
        $this->assertArrayHasKey('ids', $pendingFollowing);
    }

    public function testGetPendingFollowers()
    {
        $pendingFollowers = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getPendingFollowers();
        $this->assertArrayHasKey('ids', $pendingFollowers);
    }

    public function testGetRelationship()
    {
        $relationship = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getRelationship($this->id, $this->idFollower);
        $this->assertArrayHasKey('relationship', $relationship);
    }

    public function testGetRelationships()
    {
        $relationships = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getRelationships($this->id);
        $this->assertArrayHasKey('id', $relationships);
    }

    public function testUnfollow()
    {
        $unfollow = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->unfollow($this->id, $this->entities);
        $this->assertArrayHasKey('id', $unfollow);
    }

    public function testUpdate()
    {
        $update = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->update($this->id, $this->entities);
        $this->assertArrayHasKey('relationship', $relationships);
    }

    public function testGetFriendLists()
    {
        $friendLists = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getFriendLists('TwitterEng');
        $this->assertArrayHasKey('users', $friendLists);
    }

    public function testGetFollowerLists()
    {
        $followerLists = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getFollowerLists($this->id);
        $this->assertArrayHasKey('users', $followerLists);
    }

    public function testSetCursor()
    {
        $cursor = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCursor($this->cursor);
        $this->assertObjectHasAttribute('query', $cursor);
    }

    public function testSkipStatus()
    {
        $status = eden('twitter')
            ->friends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->skipStatus();
        $this->assertInstanceOf('Eden\\Twitter\\Friends', $status);
    }
}
