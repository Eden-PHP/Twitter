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
        $this->consumerKey = 'OanO9yIXRLPeNtjiywdHow';
        $this->consumerSecret = 'vyOvpmTNH2GCcdATJV6J0n1iT53uPYy3cgDNsgBPydY';

        $this->accessToken = '21862667-Prmb3MOGBqFhqtjf2AlHDcq8MwdSocE4t2i1k3DBB';
        $this->accessSecret = 'jTAEUuy9cSinM5UdAeh345RCjoy0dA7JtYsqzBj9M0';

        $this->id = '1';
        $this->lat = '37.781157';
        $this->long = '-122.400612831116';
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
