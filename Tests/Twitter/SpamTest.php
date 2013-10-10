<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
class Eden_Twitter_Tests_Twitter_SpamTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->accessToken = '';
        $this->accessSecret = '';

        $this->id = '';
    }

    public function testReportSpam()
    {
        $report = eden('twitter')
            ->spam($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
            ->reportSpam($this->id);
        $this->assertArrayHasKey('name' ,$report);
    }
}
