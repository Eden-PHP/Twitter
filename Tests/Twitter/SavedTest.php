<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_SavedTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->query = '';
        $this->id = '';
    }

    public function testCreateSearch()
    {
        $search = eden('twitter')
            ->saved($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->createSearch($this->query);
        $this->assertArrayHasKey('id', $search);
    }

    public function testGetDetail()
    {
        $detail = eden('twitter')
            ->saved($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getDetail($this->id);
        $this->assertArrayHasKey('id', $detail);
    }

    public function testGetSavedSearches()
    {
        $savedSearches = eden('twitter')
            ->saved($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getSavedSearches();
        $this->assertArrayHasKey('id', $savedSearches[0]);
    }

    public function testRemove()
    {
        $remove = eden('twitter')
            ->saved($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->remove($this->id);
        $this->assertArrayHasKey('id', $remove);
    }
}
