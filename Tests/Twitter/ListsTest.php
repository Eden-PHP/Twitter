<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_ListsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->userId = '';
        $this->listId = '';
        $this->ownerId = '';
        $this->userIds = array();
        $this->name = '';
        $this->id = '';
        $this->list = '';
        $this->count = '';
        $this->cursor = '';
        $this->max = '';
        $this->perPage = '';
        $this->sinceId = '';
        $this->description = '';
        $this->public = true;
    }

    public function testAddMember()
    {
        $add = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->addMember($this->userId, $this->listId, $this->ownerId);
        $this->assertArrayHasKey('full_name', $add);
    }

    public function testAddMembers()
    {
        $add = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->addMembers($this->listId, $this->userIds, $this->ownerId);
        $this->assertArrayHasKey('full_name', $add);
    }

    public function testCreateList()
    {
        $create = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->createList($this->name);
        $this->assertArrayHasKey('full_name', $create);
    }

    public function testGetMembers()
    {
        $members = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getMembers('', '');
        $this->assertArrayHasKey('users', $members);
    }

    public function testGetAllLists()
    {
        $allLists = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getAllLists($this->id);
        $this->assertArrayHasKey('id', $allLists[0]);
    }

    public function testGetList()
    {
        $getList = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getList($this->listId, $this->ownerId);
        $this->assertArrayHasKey('user', $getList);
    }

    public function testGetMemberships()
    {
        $memberships = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getMemberships($this->id);
        $this->assertArrayHasKey('lists', $memberships);
    }

    public function testGetTweets()
    {
        $getTweets = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getTweets($this->listId, $this->ownerId);
        $this->assertArrayHasKey('id', $getTweets[0]);
    }

    public function testGetSubscribers()
    {
        $getSubscribers = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getSubscribers('', '');
        $this->assertArrayHasKey('users', $getSubscribers);
    }

    public function testGetSubscriptions()
    {
        $getSubscriptions = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getSubscriptions($this->id);
        $this->assertArrayHasKey('lists', $getSubscriptions);
    }

    public function testFilterToOwn()
    {
        $filter = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->filterToOwn();
        $this->assertObjectHasAttribute('query', $filter);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }

    public function testIncludeRts()
    {
        $rts = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeRts();
        $this->assertObjectHasAttribute('query', $rts);
    }

    public function testIsMember()
    {
        $isMember = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->isMember($this->userId, $this->listId, $this->ownerId);
        $this->assertArrayHasKey('entities', $isMember);
    }

    public function testIsSubscriber()
    {
        $isSubscriber = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->isSubscriber('', '', '');
        $this->assertArrayHasKey('user', $isSubscriber);
    }

    public function testRemove()
    {
        $remove = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->remove('', '');
        $this->assertArrayHasKey('uri', $remove);
    }

    public function testRemoveMember()
    {
        $removeMember = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->removeMember('', '', '');
        $this->assertArrayHasKey('user', $removeMember);
    }

    public function testSetCount()
    {
        $setCount = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCount(1);
        $this->assertObjectHasAttribute('query', $setCount);
    }

    public function testSetCursor()
    {
        $setCursor = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCursor('1');
        $this->assertObjectHasAttribute('query', $setCursor);
    }

    public function testSetMax()
    {
        $setMax = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMax(1);
        $this->assertObjectHasAttribute('query', $setMax);
    }

    public function testSetPage()
    {
        $setPage = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPage(1);
        $this->assertObjectHasAttribute('query', $setPage);
    }

    public function testSetSinceId()
    {
        $sinceId = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId(1);
        $this->assertObjectHasAttribute('query', $sinceId);
    }

    public function testSetDescription()
    {
        $description = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setDescription('test');
        $this->assertObjectHasAttribute('query', $description);
    }

    public function testSetModeToPrivate()
    {
        $private = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setModeToPrivate();
        $this->assertObjectHasAttribute('query', $private);
    }

    public function testSkipStatus()
    {
        $skipStatus = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->skipStatus();
        $this->assertObjectHasAttribute('query', $skipStatus);
    }

    public function testSubscribe()
    {
        $subscribe = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->subscribe('', '');
        $this->assertArrayHasKey('user', $subscribe);
    }

    public function testUnsubscribe()
    {
        $unsubscribe = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->unsubscribe('', '');
        $this->assertArrayHasKey('user', $unsubscribe);
    }

    public function testUpdate()
    {
        $update = eden('twitter')
            ->lists($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->update('', '', '', '', true);
        $this->assertArrayHasKey('user', $update);
    }
}
