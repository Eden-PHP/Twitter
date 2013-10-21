<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_GeoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = 'QwgkQh3AiloLxQ9PcjqNgA';
        $this->consumerSecret = 'LNOxfFGIWTzlKSpL23qY28kxLxfwfKBDW3vh1BSw4M';

        $this->accessToken = '21862667-Prmb3MOGBqFhqtjf2AlHDcq8MwdSocE4t2i1k3DBB';
        $this->accessSecret = 'jTAEUuy9cSinM5UdAeh345RCjoy0dA7JtYsqzBj9M0';

        $this->name = 'Twitter HQ';
        $this->contained = '247f43d441defc03';
        $this->token = '36179c9bf78835898ebf521c1defd4be';
        $this->latitude = '37.78215';
        $this->longtitude = '-122.40060';

        $this->id = 'df51dec6f4ee2b2c';

        $this->query = 'Toronto';
        $this->accuracy = '0';
        $this->address = 'Manila';
        $this->callback = 'Test';
        $this->contained = '5a110d312052166f';
        $this->granularity = 'city';
        $this->ip = '74.125.19.104';
        $this->maxResults = 3;
    }

    public function testCreatePlace()
    {
        $create = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->createPlace($this->name, $this->contained, $this->token, $this->latitude, $this->longtitude);
        print_r($create);
        $this->assertArrayHasKey('full_name', $create);
    }

    public function testGetGeocode()
    {
        $geoCode = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getGeoCode($this->latitude, $this->longtitude);
        $this->assertArrayHasKey('query', $geoCode);
    }

    public function testGetPlace()
    {
        $place = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getPlace($this->id);
        $this->assertArrayHasKey('id', $place);
    }

    public function testGetSimilarPlaces()
    {
        $similarPlaces = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->getSimilarPlaces($this->latitude, $this->longtitude, $this->name);
        $this->assertArrayHasKey('query', $similarPlaces);
    }

    public function testSearch()
    {
        $search = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->search($this->query);
        $this->assertArrayHasKey('query', $search);
    }

    public function testSetAccuracy()
    {
        $setAccuracy = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setAccuracy($this->accuracy);
        $this->assertObjectHasAttribute('query', $setAccuracy);
    }

    public function testSetAddress()
    {
        $address = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setAddress($this->address);
        $this->assertObjectHasAttribute('query', $address);
    }

    public function testSetCallback()
    {
        $callback = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setCallback($this->callback);
        $this->assertObjectHasAttribute('query', $callback);
    }

    public function testSetContained()
    {
        $contained = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setContained($this->contained);
        $this->assertObjectHasAttribute('query', $contained);
    }

    public function testSetGranularity()
    {
        $granularity = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setGranularity($this->granularity);
        $this->assertObjectHasAttribute('query', $granularity);
    }

    public function testSetIp()
    {
        $ip = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setIp($this->ip);
        $this->assertObjectHasAttribute('query', $ip);
    }

    public function testSetLatitude()
    {
        $setLatitude = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLatitude($this->latitude);
        $this->assertObjectHasAttribute('query', $setLatitude);
    }

    public function testSetLongtitude()
    {
        $setLongtitude = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setLongtitude($this->longtitude);
        $this->assertObjectHasAttribute('query', $setLongtitude);
    }

    public function testSetMaxResults()
    {
        $maxResults = eden('twitter')
            ->geo($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->setMaxResults($this->maxResults);
        $this->assertObjectHasAttribute('query', $maxResults);
    }
}
