<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Twitter;

/**
 * Twitter users
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Users extends Base
{
    const URL_USERS_SETTING = 'https://api.twitter.com/1.1/account/settings.json';
    const URL_USERS_VERIFY_CREDENTIALS = 'https://api.twitter.com/1.1/account/verify_credentials.json';
    const URL_USERS_UPDATE_DEVICE = 'https://api.twitter.com/1.1/account/update_delivery_device.json';
    const URL_USERS_UPDATE_PROFILE = 'https://api.twitter.com/1.1/account/update_profile.json';
    const URL_USERS_UPDATE_BACKGROUND = 'https://api.twitter.com/1.1/account/update_profile_background_image.json';
    const URL_UPDATE_PROFILE_COLOR = 'https://api.twitter.com/1.1/account/update_profile_colors.json';
    const URL_ACCOUNT_UPLOAD = 'https://api.twitter.com/1.1/account/update_profile_image.json';
    const URL_USERS_BLOCK_LIST = 'https://api.twitter.com/1.1/blocks/list.json';
    const URL_GET_BLOCKING_ID = 'https://api.twitter.com/1.1/blocks/ids.json';
    const URL_CREATE_BLOCKING = 'https://api.twitter.com/1.1/blocks/create.json';
    const URL_REMOVE_BLOCKING = 'https://api.twitter.com/1.1/blocks/destroy.json';
    const URL_LOOK_UP = 'https://api.twitter.com/1.1/users/lookup.json';
    const URL_SEARCH = 'https://api.twitter.com/1.1/users/search.json';
    const URL_SHOW = 'https://api.twitter.com/1.1/users/show.json';
    const URL_CONTRIBUTEES = 'https://api.twitter.com/1.1/users/contributees.json';
    const URL_CONTRIBUTORS = 'https://api.twitter.com/1.1/users/contributors.json';

    protected $id = NULL;
    protected $name = NULL;
    protected $size = NULL;
    protected $page = NULL;
    protected $perpage = NULL;
    protected $entities = NULL;
    protected $status = NULL;

    /**
     * Returns settings (including current trend, geo and sleep time information)
     * for the authenticating user.
     *
     * @return array
     */
    public function getAccountSettings()
    {
        return $this->getResponse(self::URL_USERS_SETTING);
    }

    /**
     * Returns an HTTP 200 OK response code and
     * a representation of the requesting user
     * if authentication was successful
     *
     * @return array
     */
    public function getCredentials()
    {
        return $this->getResponse(self::URL_USERS_VERIFY_CREDENTIALS, $this->query);
    }

    /**
     * Sets which device Twitter delivers updates to for the authenticating user.
     * Sending none as the device parameter will disable SMS updates.
     *
     * @param string
     * @return array
     */
    public function updateDeliveryDevice($device)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        $this->query['device'] = $device;

        return $this->post(self::URL_USERS_UPDATE_DEVICE, $this->query);
    }

    /**
     * Sets values that users are able to set
     * under the "Account" tab of their settings
     * page. Only the parameters specified
     * will be updated.
     *
     * @return array
     */
    public function updateProfile()
    {
        return $this->post(self::URL_USERS_UPDATE_PROFILE, $this->query);
    }

    /**
     * Updates the authenticating user's profile background image.
     * This method can also be used to enable or disable the profile
     * background image
     *
     * @param string
     * @return array
     */
    public function updateBackgroundImage($image)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['image'] = $image;

        return $this->upload(self::URL_USERS_UPDATE_BACKGROUND, $this->query);
    }

    /**
     * Sets values that users are able to
     * set under the Account tab of their
     * settings page. Only the parameters
     * specified will be updated.
     *
     * @return array
     */
    public function updateProfileColor()
    {
        return $this->post(self::URL_UPDATE_PROFILE_COLOR, $this->query);
    }

    /**
     * Updates the authenticating user's profile image.
     *
     * @param string
     * @return array
     */
    public function updateProfileImage($image)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['image'] = $image;

        return $this->upload(self::URL_ACCOUNT_UPLOAD, $this->query);
    }

    /**
     * Returns a collection of user objects that the authenticating user is blocking.
     *
     * @return array
     */
    public function getBlockList()
    {
        return $this->getResponse(self::URL_USERS_BLOCK_LIST, $this->query);
    }

    /**
     * Returns an array of numeric user ids
     * the authenticating user is blocking.
     *
     * @param boolean
     * @return integer
     */
    public function getBlockedUserIds($stringify = false)
    {
        //Argument 1 must be a boolean
        Argument::i()->test(1, 'bool');

        $this->query['stringify_ids'] = $stringify;

        return $this->getResponse(self::URL_GET_BLOCKING_ID, $this->query);
    }

    /**
     * Blocks the specified user from following the authenticating user.
     *
     * @param string|integer either the screen name or user ID
     * @return array
     */
    public function blockUser($id)
    {
        //Argument 1 must be a string, integer
        Argument::i()->test(1, 'string', 'int');

        //if it is integer
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->post(self::URL_CREATE_BLOCKING, $this->query);
    }

    /**
     * Un-blocks the user specified in the ID parameter for the
     * authenticating user.
     *
     * @param string|integer
     * @return array
     */
    public function unblock($id)
    {
        //Argument 1 must be a string, integer
        Argument::i()->test(1, 'string', 'int');

        //if it is integer
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->post(self::URL_REMOVE_BLOCKING, $this->query);
    }

    /**
     * Return up to 100 users worth of extended information,
     * specified by either ID, screen name, or combination of the two.
     *
     * @return array
     */
    public function lookupFriends()
    {
        //if id is integer
        if(is_int($this->query['user_id'])) {
            $id = explode(',', $this->query['user_id']);
            //at this point id will be an array
            $id = array();
            //lets put it in query
            $this->query['user_id'] = $id;
        }

        //if name is string
        if(is_string($this->query['screen_name'])) {
            $name = explode(',', $this->query['screen_name']);
            //at this point id will be an array
            $name = array();
            $this->query['screen_name'] = $name;
        }

        return $this->getResponse(self::URL_LOOK_UP, $this->query);
    }
    /**
     * Returns an array of users that
     * the specified user can contribute to.
     *
     * @param string|null
     * @param string|null
     * @return array
     */
    public function getContributees($id = NULL, $name = NULL)
    {
        //Argument test
        Argument::i()
            ->test(1,'string', 'null')      //Argument 1 must be a string or null
            ->test(2,'string', 'null');     //Argument 2 must be a string or null

        if(!is_null($id)) {
            if(is_int($id)) {
                $this->query['user_id'] = $id;
            }

            if(!is_int($id)) {
                $this->query['screen_name'] = $id;
            }
        }

        if(!is_null($name)) {
            $this->query['screen_name'] = $name;
        }

        return $this->getResponse(self::URL_CONTRIBUTEES, $this->query);
    }

    /**
     * Returns an array of users that
     * the specified user can contribute to.
     *
     * @param string|null
     * @param string|null
     * @return array
     */
    public function getContributors($id = NULL, $name = NULL)
    {
        //Argument test
        Argument::i()
            ->test(1,'string', 'null')      //Argument 1 must be a string or null
            ->test(2,'string', 'null');     //Argument 2 must be a string or null

        if(!is_null($id)) {
            if(is_int($id)) {
                $this->query['user_id'] = $id;
            }

            if(!is_int($id)) {
                $this->query['screen_name'] = $id;
            }
        }

        if(!is_null($name)) {
            $this->query['screen_name'] = $name;
        }

        return $this->getResponse(self::URL_CONTRIBUTORS, $this->query);
    }

    /**
     * Returns extended information of a given user, specified
     * by ID or screen name as per the required id parameter.
     *
     * @param int
     * @return array
     */
    public function getDetail($id)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        //if it is integer
        if(is_int($id)) {
            //it is user id
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //it is screen name
            $this->query['screen_name'] = $id;
        }

        return $this->getResponse(self::URL_SHOW, $this->query);
    }

    /**
     * Runs a search for users similar to find people
     *
     * @param string
     * @return array
     */
    public function search($search)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['q'] = $search;

        return $this->getResponse(self::URL_SEARCH, $this->query);
    }

    /**
     * Set name
     *
     * @param string
     * @return this
     */
    public function setName($name)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string');
        $this->query['name'] = $name;

        return $this;
    }

    /**
     * Set url
     *
     * @param string
     * @return this
     */
    public function setUrl($url)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string');
        $this->query['url'] = $url;

        return $this;
    }

    /**
     * Set description
     *
     * @param string
     * @return this
     */
    public function setDescription($description)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string');
        $this->query['description'] = $description;

        return $this;
    }

    /**
     * Set location
     *
     * @param string
     * @return this
     */
    public function setLocation($location)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string');
        $this->query['location'] = $location;

        return $this;
    }

    /**
     * Set profile background image to tile
     *
     * @return this
     */
    public function setToTile()
    {
        $this->query['tile'] = true;

        return $this;
    }

    /**
     * Disable profile image background
     *
     * @return this
     */
    public function disableProfileBackground()
    {
        $this->query['use'] = false;

        return $this;
    }

    /**
     * Set profile background color
     *
     * @param string
     * @return this
     */
    public function setBackgroundColor($background)
    {
        //Argument 3 must be a string
        Argument::i()->test(1, 'string');
        $this->query['profile_background_color'] = $backgroud;

        return $this;
    }

    /**
     * Set profile sibebar border color
     *
     * @param string
     * @return this
     */
    public function setBorderColor($border)
    {
        //Argument must be a string
        Argument::i()->test(1, 'string');
        $this->query['profile_sidebar_border_color'] = $border;

        return $this;
    }

    /**
     * Set profile sibebar fill color
     *
     * @param string
     * @return this
     */
    public function setFillColor($fill)
    {
        //Argument must be a string
        Argument::i()->test(1, 'string');
        $this->query['profile_sidebar_fill_color'] = $fill;

        return $this;
    }

    /**
     * Set profile link color
     *
     * @param string
     * @return this
     */
    public function setLinkColor($link)
    {
        //Argument must be a string
        Argument::i()->test(1, 'string');
        $this->query['profile_link_color'] = $link;

        return $this;
    }

    /**
     * Set profile text color
     *
     * @param string
     * @return this
     */
    public function setTextColor($textColor)
    {
        //Argument must be a string
        Argument::i()->test(1, 'string');
        $this->query['profile_text_color'] = $textColor;

        return $this;
    }

    /**
     * Set include entities
     *
     * @return this
     */
    public function includeEntities()
    {
        $this->query['include_entities'] = true;

        return $this;
    }

    /**
     * Set user id
     *
     * @param integer
     * @return this
     */
    public function setUserId($id)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['user_id'] = $id;

        return $this;
    }

    /**
     * Set screen name
     *
     * @param string
     * @return this
     */
    public function setScreenName($name)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'string');
        $this->query['screen_name'] = $name;

        return $this;
    }

    /**
     * Set page
     *
     * @param integer
     * @return this
     */
    public function setPage($page)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['page'] = $page;

        return $this;
    }

    /**
     * Set per page
     *
     * @param integer
     * @return this
     */
    public function setPerpage($perPage)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['per_page'] = $perPage;

        return $this;
    }

    /**
     * Set skip status
     *
     * @return this
     */
    public function skipStatus()
    {
        $this->query['skip_status'] = true;

        $this->status = true;
        return $this;
    }
}
