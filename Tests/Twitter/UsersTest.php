<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_UsersTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->device = '';
        $this->image = '';
        $this->stringify = false;

        $this->id = '';
        $this->search = '';

        $this->name = '';
        $this->url = '';
        $this->description = '';
        $this->location = '';
        $this->background = '';
        $this->border = '';
        $this->fill = '';
        $this->link = '';
        $this->textColor = '';
        $this->page = '1';
        $this->perPage = '1';
    }

    public function testGetAccountSettings()
    {
        $settings = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getAccountSettings();
        $this->assertArrayHasKey('screen_name', $settings);
    }

    public function testGetCredentials()
    {
        $credentials = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getCredentials();
        $this->assertArrayHasKey('id', $credentials);
    }

    public function testUpdateDeliveryDevice()
    {
         $device = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->updateDeliveryDevice($this->device);
    }

    public function testUpdateProfile()
    {
        $profile = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->updateProfile();
        $this->assertArrayHasKey('id', $profile);
    }

    public function testUpdateBackgroundImage()
    {
        $image = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->updateBackgroundImage($this->image);
        $this->assertArrayHasKey('id', $image);
    }

    public function testUpdateProfileColor()
    {
        $profileColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->updateProfileColor();
        $this->assertArrayHasKey('id', $profileColor);
    }

    public function testUpdateProfileImage()
    {
        $profileImage = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->updateProfileImage($this->image);
        $this->assertArrayHasKey('id', $profileImage);
    }

    public function testGetBlockList()
    {
        $blockList = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getBlockList();
        $this->assertArrayHasKey('users', $blockList);
    }

    public function testGetBlockedUserIds()
    {
        $blockedUserIds = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getBlockedUserIds($this->stringify);
        $this->assertArrayHasKey('ids', $blockedUserIds);
    }

    public function testBlockUser()
    {
        $user = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->blockUser($this->id);
        $this->assertArrayHasKey('id', $user);
    }

    public function testUnblock()
    {
        $unblock = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->unblock($this->id);
        $this->assertArrayHasKey('id', $unblock);
    }

    public function testLookupFriends()
    {
        $lookup = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->lookupFriends();
        $this->assertArrayHasKey('id', $lookup[0]);
    }

    public function testGetContributees()
    {
        $contributees = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getContributees($this->id);
    }

    public function testGetContributors()
    {
        $contributors = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getContributors($this->id);
    }

    public function testGetDetail()
    {
        $detail = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getDetail($this->id);
        $this->assertArrayHasKey('id', $detail);
    }

    public function testSearch()
    {
        $search = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->search($this->search);
        $this->assertArrayHasKey('id', $search[0]);
    }

    public function testSetName()
    {
        $name = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setName($this->name);
        $this->assertObjectHasAttribute('query', $name);
    }

    public function testSetUrl()
    {
        $url = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setUrl($this->url);
        $this->assertObjectHasAttribute('query', $url);
    }

    public function testSetDescription()
    {
        $description = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setDescription($this->description);
        $this->assertObjectHasAttribute('query', $description);
    }

    public function testSetLocation()
    {
        $location = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLocation($this->location);
        $this->assertObjectHasAttribute('query', $location);
    }

    public function testSetToTile()
    {
        $tile = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setToTile();
        $this->assertObjectHasAttribute('query', $tile);
    }

    public function testDisableProfileBackground()
    {
        $disable = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->disableProfileBackground();
        $this->assertObjectHasAttribute('query', $disable);
    }

    public function testSetBackgroundColor()
    {
        $backgroundColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setBackgroundColor($this->background);
        $this->assertObjectHasAttribute('query', $backgroundColor);
    }

    public function testSetBorderColor()
    {
        $borderColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setBorderColor($this->border);
        $this->assertObjectHasAttribute('query', $borderColor);
    }

    public function testSetFillColor()
    {
        $fillColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setFillColor($this->fill);
        $this->assertObjectHasAttribute('query', $fillColor);
    }

    public function testSetLinkColor()
    {
        $linkColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLinkColor($this->link);
        $this->assertObjectHasAttribute('query', $linkColor);
    }

    public function testSetTextColor()
    {
        $textColor = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setTextColor($this->textColor);
        $this->assertObjectHasAttribute('query', $textColor);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }

    public function testSetUserId()
    {
        $userId = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setUserId($this->id);
        $this->assertObjectHasAttribute('query', $userId);
    }

    public function testSetScreenName()
    {
        $screenName = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setScreenName($this->name);
        $this->assertObjectHasAttribute('query', $screenName);
    }

    public function testSetPage()
    {
        $setPage = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPage($this->page);
        $this->assertObjectHasAttribute('query', $setPage);
    }

    public function testSetPerpage()
    {
        $perPage = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPerpage($this->perPage);
        $this->assertObjectHasAttribute('query', $perPage);
    }

    public function testSkipStatus()
    {
        $skipStatus = eden('twitter')
            ->users($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->skipStatus();
        $this->assertObjectHasAttribute('query', $skipStatus);
    }
}
