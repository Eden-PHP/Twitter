<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_TrendsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '1';
        $this->lat = '';
        $this->long = '';
    }

    public function testGetPlaceTrending()
    {
        $placeTrending = eden('twitter')
            ->trends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getPlaceTrending($this->id);
        $this->assertArrayHasKey('trends', $placeTrending[0]);
    }

    public function testGetAvailableTrending()
    {
        $availableTrending = eden('twitter')
            ->trends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getAvailableTrending();
        $this->assertArrayHasKey('name', $availableTrending[0]);
    }

    public function testGetClosestTrending()
    {
        $closestTrending = eden('twitter')
            ->trends($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getClosestTrending($this->lat, $this->long);
        $this->assertArrayHasKey('name', $closestTrending[0]);
    }
}
