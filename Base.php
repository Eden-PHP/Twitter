<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Twitter;

use Eden\Core\Base as CoreBase;
use Eden\Curl\Base as Curl;
use Eden\Oauth\Oauth1\Consumer;
use Eden\Oauth\Oauth1\Base as Oauth1Base;

/**
 * Twitter Base
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Base extends Oauth1Base
{
    protected $consumerKey = NULL;
    protected $consumerSecret = NULL;
    protected $accessToken = NULL;
    protected $accessSecret = NULL;
    protected $signingKey = NULL;
    protected $baseString = NULL;
    protected $signingParams = NULL;
    protected $url = NULL;
    protected $authParams = NULL;
    protected $authHeader = NULL;
    protected $headers = NULL;
    protected $query = array();

    /**
     * Construct - Storing tokens
     *
     * @param string
     * @param string
     * @param string
     * @param string
     * @return void
     */
    public function __construct($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->accessToken = $accessToken;
        $this->accessSecret = $accessSecret;
    }

    /**
     * Returns the meta of the last call
     *
     * @return array
     */
    public function getMeta($key = NULL)
    {
        Argument::i()->test(1, 'string', 'null');

        if(isset($this->meta[$key])) {
            return $this->meta[$key];
        }

        return $this->meta;
    }

    /**
     * Check if the response is json format
     *
     * @param string
     * @return boolean
     */
    public function isJson($string)
    {
        //argument 1 must be a string
        Argument::i()->test(1, 'string');

        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Gets the access keys
     *
     * @param array
     * @return array
     */
    protected function accessKey($array)
    {
        foreach($array as $key => $val) {
            if(is_array($val)) {
                $array[$key] = $this->accessKey($val);
            }

            //if value is null
            if(is_null($val) || empty($val)) {
                unset($array[$key]);
            } else if($val === false) {
                $array[$key] = 0;
            } else if($val === true) {
                $array[$key] = 1;
            }

        }

        return $array;
    }

    /**
     * Gets the response
     *
     * @param string
     * @param array
     * @return array
     */
    protected function getResponse($url, array $query = array())
    {
        //prevent sending fields with no value
        $query = $this->accessKey($query);

        $rest = Consumer::i($url, $this->consumerKey, $this->consumerSecret)
            ->setMethodToGet()
            ->setToken($this->accessToken, $this->accessSecret)
            ->setSignatureToHmacSha1();

        //get response from curl
        $response = $rest->getResponse($query);

        //reset variables
        unset($this->query);

        $this->meta = $rest->getMeta();

        //check if the response is in json format
        if($this->isJson($response)) {
            //json encode it
            return json_decode($response, true);
        //else it is a raw query
        } else {
            //return it
            return $response;
        }
    }

    /**
     * Sets up the post request
     *
     * @param string
     * @param array
     * @return array
     */
    protected function post($url, array $query = array())
    {
        //prevent sending fields with no value
        $query = $this->accessKey($query);

        $rest = Consumer::i($url, $this->consumerKey, $this->consumerSecret)
            ->setMethodToPost()
            ->setToken($this->accessToken, $this->accessSecret)
            ->setSignatureToHmacSha1();

        //get the authorization parameters as an array
        $signature      = $rest->getSignature($query);
        $authorization  = $rest->getAuthorization($signature, false);
        $authorization  = $this->buildQuery($authorization);

        if(is_array($query)) {
            $query  = $this->buildQuery($query);
        }

        $headers = array();
        $headers[] = Consumer::POST_HEADER;

        //determine the conector
        $connector = NULL;

        //if there is no question mark
        if(strpos($url, '?') === false) {
            $connector = '?';
        //if the redirect doesn't end with a question mark
        } else if(substr($url, -1) != '?') {
            $connector = '&';
        }

        //now add the authorization to the url
        $url .= $connector.$authorization;
        //set curl
        $curl = Curl::i()
            ->verifyHost(false)
            ->verifyPeer(false)
            ->setUrl($url)
            ->setPost(true)
            ->setPostFields($query)
            ->setHeaders($headers);

        //get the response
        $response = $curl->getJsonResponse();

        //reset variables
        unset($this->query);

        $this->meta = $curl->getMeta();
        $this->meta['url'] = $url;
        $this->meta['authorization'] = $authorization;
        $this->meta['headers'] = $headers;
        $this->meta['query'] = $query;

        return $response;
    }

    /**
     * Sets up the upload request
     *
     * @param string
     * @param array
     * @return array
     */
    protected function upload($url, array $query = array())
    {
        //prevent sending fields with no value
        $query = $this->accessKey($query);
        //set url
        $this->url = $url;
        //make authorization for twitter
        $this->getAuthentication();
        //set headers
        $this->headers['Expect'] = '';
            //at this point, the authentication header si already set
            foreach($this->headers as $k => $v) {
                //trim header
                $headers[] = trim($k . ': ' . $v);
            }

         //set curl
        $curl = Curl::i()
            ->verifyHost(false)
            ->verifyPeer(false)
            ->setUrl($url)
            ->setPost(true)
            ->setPostFields($query)
            ->setHeaders($headers);

        //json decode the response
        $response = $curl->getJsonResponse();

        //reset variables
        unset($this->query);

        $this->meta = $curl->getMeta();
        $this->meta['url'] = $url;
        $this->meta['headers'] = $headers;
        $this->meta['query'] = $query;

        return $response;
    }

    /**
     * Gets the authentication and sets up the header
     *
     *
     * @return this
     */
    protected function getAuthentication()
    {
        //populate fields
        $defaults = array(
          'oauth_version' => '1.0',
          'oauth_nonce' => md5(uniqid(rand(), true)),
          'oauth_timestamp' => time(),
          'oauth_consumer_key' => $this->consumerKey,
          'oauth_signature_method' => 'HMAC-SHA1',
          'oauth_token' => $this->accessToken);

        //encode the parameters
        foreach ($defaults as $k => $v) {
          $this->signingParams[$this->safeEncode($k)] = $this->safeEncode($v);
        }

        //sort an array by keys using a user-defined comparison function
        uksort($this->signingParams, 'strcmp');

        foreach ($this->signingParams as $k => $v) {
            //encode key
            $k = $this->safeEncode($k);
            //encode value
            $v = $this->safeEncode($v);
            $signing_params[$k] = $v;
            $kv[] = "{$k}={$v}";
        }

        //implode signingParams to make it a string
        $this->signingParams = implode('&', $kv);

        //check if they have the same value
        $this->authParams = array_intersect_key($defaults, $signing_params);

        //make a base string
        $base = array('POST', $this->url, $this->signingParams);

        //convert array to string and safely encode it
        $this->baseString = implode('&', $this->safeEncode($base));

        //make a signing key by combining consumer secret and access secret
        $this->signingKey = $this->safeEncode($this->consumerSecret).'&'.$this->safeEncode($this->accessSecret);

        //generate signature
        $this->authParams['oauth_signature'] = $this->safeEncode(
            base64_encode(hash_hmac('sha1', $this->baseString, $this->signingKey, true)));

        foreach ($this->authParams as $k => $v) {
          $kv[] = "{$k}=\"{$v}\"";
        }

        //implode authHeader to make it ia string
        $this->authHeader = 'OAuth ' . implode(', ', $kv);

        //put it in the authorization headera
        $this->headers['Authorization'] = $this->authHeader;
    }

    /**
     * Sets up the date to be safe encoded
     *
     * @param string
     * @return string|null
     */
    protected function safeEncode($data)
    {
        //if data is in array
        if (is_array($data)) {
            //array map the data
            return array_map(array($this, 'safeEncode'), $data);

        //else it is not array
        } else if (is_scalar($data)) {
          //str ireplace data, it is case-insensitive version of str_replace()
          return str_ireplace(array('+', '%7E'), array(' ', '~'), rawurlencode($data));

        //else it is null or uempty
        } else {
          return '';
        }

    }
}
