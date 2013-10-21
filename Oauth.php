<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Twitter;

use Eden\Oauth\Factory as FactoryOauth;

/**
 * Twitter oauth
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Oauth extends Base
{
    const REQUEST_URL = 'https://api.twitter.com/oauth/request_token';
    const AUTHORIZE_URL = 'https://api.twitter.com/oauth/authorize';
    const ACCESS_URL = 'https://api.twitter.com/oauth/access_token';

    protected $key = NULL;
    protected $secret   = NULL;

    /**
     * Construct - Stores tokens
     *
     * @param string
     * @param string
     * @return void
     */
    public function __construct($key, $secret)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string');

        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * Returns the access token
     *
     * @param string
     * @param string
     * @return string
     */
    public function getAccessToken($token, $secret, $verifier)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string');

        return FactoryOauth::i()->v1()
            ->consumer(
                self::ACCESS_URL,
                $this->key,
                $this->secret)
            ->useAuthorization()
            ->setMethodToPost()
            ->setToken($token, $secret)
            ->setVerifier($verifier)
            ->setSignatureToHmacSha1()
            ->getQueryResponse();
    }

    /**
     * Returns the URL used for login.
     *
     * @param string
     * @param string
     * @param boolean
     * @return string
     */
    public function getLoginUrl($token, $redirect, $force_login = false)
    {
        //Argument tests
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a boolean
            ->test(3, 'bool');

        //build the query
        $query = array('oauth_token' => $token, 'oauth_callback' => $redirect, 'force_login' => (int)$force_login);
        $query = http_build_query($query);

        return self::AUTHORIZE_URL.'?'.$query;
    }

    /**
     * Return a request token
     *
     * @return string
     */
    public function getRequestToken()
    {
        return FactoryOauth::i()->v1()
            ->consumer(
                self::REQUEST_URL,
                $this->key,
                $this->secret)
            ->useAuthorization()
            ->setMethodToPost()
            ->setSignatureToHmacSha1()
            ->getQueryResponse();
    }
}
