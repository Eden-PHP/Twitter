<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Twitter_Tests_Twitter_OauthTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        $this->consumerKey = '';
        $this->consumerSecret = '';

        $this->verifier = '';

        $this->oauthToken = '';
        $this->oauthTokenSecret = '';
        $this->redirect = '';
        $this->forceLogin = false;
    }

    public function testGetAccessToken()
    {
        $accessToken = eden('twitter')->auth($this->consumerKey, $this->consumerSecret)
            ->getAccessToken($this->oauthToken, $this->oauthTokenSecret, $this->verifier);
    }

    public function testGetLoginUrl()
    {
        $loginUrl = eden('twitter')->auth($this->consumerKey, $this->consumerSecret)
            ->getLoginUrl($this->oauthToken, $this->redirect, $this->forceLogin);
    }

    public function testGetRequestToken()
    {
        $requestToken = eden('twitter')->auth($this->consumerKey, $this->consumerSecret)
            ->getRequestToken();
    }
}
