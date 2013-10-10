<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_SearchTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->query = '';
        $this->callback = '';
        $this->geocode = '';
        $this->language = '';
        $this->locale = '';
        $this->page = 1;
        $this->rpp = '';
        $this->sinceId = '';
        $this->until = '';
    }

    public function testSearch()
    {
        $search = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->search($this->query);
        $this->assertArrayHasKey('statuses', $search);
    }

    public function testSetCallback()
    {
        $callback = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCallback($this->callback);
        $this->assertObjectHasAttribute('query', $callback);
    }

    public function testIncludeEntities()
    {
        $entities = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->includeEntities();
        $this->assertObjectHasAttribute('query', $entities);
    }

    public function testSetGeocode()
    {
        $geocode = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setGeocode($this->geocode);
        $this->assertObjectHasAttribute('query', $geocode);
    }

    public function testSetLanguage()
    {
        $language = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLanguage($this->language);
        $this->assertObjectHasAttribute('query', $language);
    }

    public function testSetLocale()
    {
        $locale = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLocale($this->locale);
        $this->assertObjectHasAttribute('query', $locale);
    }

    public function testSetPage()
    {
        $page = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPage($this->page);
        $this->assertObjectHasAttribute('query', $page);
    }

    public function testSetMixedResultType()
    {
        $mixedResult = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMixedResultType();
        $this->assertObjectHasAttribute('query', $mixedResult);
    }

    public function testSetRecentResultType()
    {
        $recentResult = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setRecentResultType();
        $this->assertObjectHasAttribute('query', $recentResult);
    }

    public function testSetPopularResultType()
    {
        $popularResult = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setPopularResultType();
        $this->assertObjectHasAttribute('query', $popularResult);
    }

    public function testSetRpp()
    {
        $rpp = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setRpp($this->rpp);
        $this->assertObjectHasAttribute('query', $rpp);
    }

    public function testSetSinceId()
    {
        $sinceId = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setSinceId($this->sinceId);
        $this->assertObjectHasAttribute('query', $sinceId);
    }

    public function testShowUser()
    {
        $user = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->showUser();
        $this->assertObjectHasAttribute('query', $user);
    }

    public function testSetUntil()
    {
        $until = eden('twitter')
            ->search($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setUntil($this->until);
        $this->assertObjectHasAttribute('query', $until);
    }
}
