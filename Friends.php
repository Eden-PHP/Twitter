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
 * Twitter friends and followers
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Friends extends Base
{
    const URL_FRIENDS = 'https://api.twitter.com/1.1/friends/ids.json';
    const URL_FOLLOWERS = 'https://api.twitter.com/1.1/followers/ids.json';
    const URL_LOOKUP_FRIENDS = 'https://api.twitter.com/1.1/friendships/lookup.json';
    const URL_INCOMING_FRIENDS = 'https://api.twitter.com/1.1/friendships/incoming.json';
    const URL_OUTGOING_FRIENDS = 'https://api.twitter.com/1.1/friendships/outgoing.json';
    const URL_FOLLOW_FRIENDS = 'https://api.twitter.com/1.1/friendships/create.json';
    const URL_UNFOLLOW_FRIENDS = 'https://api.twitter.com/1.1/friendships/destroy.json';
    const URL_UPDATE = 'https://api.twitter.com/1.1/friendships/update.json';
    const URL_SHOW_FRIENDS = 'https://api.twitter.com/1.1/friendships/show.json';
    const URL_FOLLOWER_LISTS = 'https://api.twitter.com/1.1/followers/list.json';
    const URL_FRIEND_LISTS = 'https://api.twitter.com/1.1/friends/list.json';

    protected $status = NULL;
    protected $cursor = NULL;

    /**
     * Returns an array of numeric IDs for
     * every user the specified user is following.
     *
     * @param string|int
     * @return array
     */
    public function getFollowing($id = NULL)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'int', 'string', 'null');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in query
            $this->query['string_name'] = $id;
        }

        return $this->getResponse(self::URL_FRIENDS, $this->query);
    }

    /**
     * Returns an array of numeric IDs for every
     * user following the specified user.
     *
     * @param string|int|null
     * @return array
     */
    public function getFollowers($id = NULL)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'int', 'string', 'null');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in query
            $this->query['string_name'] = $id;
        }

        return $this->getResponse(self::URL_FOLLOWERS, $this->query);
    }

    /**
     * Allows the authenticating users to follow the
     * user specified in the ID parameter..
     *
     * @param string|int
     * @param bool
     * @return array
     */
    public function follow($id, $notify = false)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be an integer, string
            ->test(1, 'string', 'int')
            //Argument 1 must be a boolean
            ->test(2, 'bool');

        //if it is integer
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->post(self::URL_FOLLOW_FRIENDS, $this->query);
    }

    /**
     * Returns an array of numeric IDs for every protected user
     * for whom the authenticating user has a pending follow request.
     *
     * @return array
     */
    public function getPendingFollowing()
    {
        return $this->getResponse(self::URL_OUTGOING_FRIENDS, $this->query);
    }

    /**
     * Returns an array of numeric IDs for every user
     * who has a pending request to follow the authenticating user.
     *
     * @return array
     */
    public function getPendingFollowers()
    {
        return $this->getResponse(self::URL_INCOMING_FRIENDS, $this->query);
    }

    /**
     * Returns detailed information about the
     * relationship between two users.
     *
     * @param int|string
     * @param int|string
     * @return array
     */
    public function getRelationship($id, $target)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be an integer, string
            ->test(1, 'string', 'int')
            //Argument 2 must be an integer, string
            ->test(2, 'string', 'int');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['source_id'] = $id;
        //if it is string
        } else {
            //lets put it in query
            $this->query['source_screen_name'] = $id;
        }

        //if it is integer
        if(is_int($target)) {
            //lets put it in query
            $this->query['target_id'] = $target;
        //if it is string
        } else {
            //lets put it in query
            $this->query['target_screen_name'] = $target;
        }

        return $this->getResponse(self::URL_SHOW_FRIENDS, $this->query);
    }

    /**
     * Returns the relationship of the authenticating user to
     * the comma separated list
     *
     * @param int|string|array|null
     * @return array
     */
    public function getRelationships($id = NULL)
    {
        //Argument 1 must be an integer, string or null
        Argument::i() ->test(1, 'int', 'string', 'array', 'null');

        //if it is empty
        if(is_null($id)) {
            return $this->getResponse(self::URL_LOOKUP_FRIENDS, $this->query);
        }

        //if it's not an array
        if(!is_array($id)) {
            //make it into one
            $id = func_get_args();
        }

        //if id is integer
        if(is_int($id[0])) {
            //lets put it in query
            $this->query['user_id'] = implode(',',$id);
        //if it is streing
        } else {
            //lets put it in query
            $this->query['screen_name'] = implode(',',$id);
        }

        return $this->getResponse(self::URL_LOOKUP_FRIENDS, $this->query);
    }

    /**
     * Allows the authenticating users to unfollow
     * the user specified in the ID parameter.
     *
     * @param string|int
     * @param bool
     * @return array
     */
    public function unfollow($id, $entities = false)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string or int
            ->test(1, 'string', 'int')
            //Argument 2 must be an boolean
            ->test(2, 'boolean');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        } else {
            //lets put it in query
            $this->query['string_name'] = $id;
        }

        //if entities
        if($entities) {
            $this->query['include_entities'] = $entities;
        }

        return $this->post(self::URL_UNFOLLOW_FRIENDS, $this->query);
    }

    /**
     * Allows one to enable or disable retweets and device notifications
     * from the specified user.
     *
     * @param string|int
     * @param boolean
     * @param boolean
     * @return array
     */
    public function update($id, $device = false, $retweets = false)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string or int
            ->test(1, 'string', 'int')
            //Argument 2 must be a boolean
            ->test(2, 'bool')
            //Argument 3 must be a boolean
            ->test(3, 'bool');

        //if id is string
        if(is_string($id)) {
            //lets put it in query
            $this->query['screen_name'] = $id;
        //else it is integer
        } else {
            //lets put it in query
            $this->query['user_id'] = $id;
        }

        if($device) {
            //lets put it in query
            $this->query['device'] = 1;
        }

        if($retweets) {
            //lets put it in query
            $this->query['retweets'] = 1;
        }

        return $this->post(self::URL_UPDATE, $this->query);
    }

    /**
     * get list of friends/following with details
     *
     *
     * @param string|int|null
     * @return void
     **/
    public function getFriendLists($id = null)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'int', 'string', 'null');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in query
            $this->query['string_name'] = $id;
        }

        $this->query['include_user_entities'] = false;

        return $this->getResponse(self::URL_FRIEND_LISTS, $this->query);
    }

    /**
     * get list of followers with details
     *
     *
     * @param string|int|null
     * @return void
     **/
    public function getFollowerLists($id = null)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'int', 'string', 'null');

        //if it is integer
        if(is_int($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in query
            $this->query['string_name'] = $id;
        }

        $this->query['include_user_entities'] = false;

        return $this->getResponse(self::URL_FOLLOWER_LISTS, $this->query);
    }

    /**
     * Set cursor
     *
     * @return this
     */
    public function setCursor($cursor = null)
    {
        Argument::i()->test(1, 'int', 'null');

        $this->query['cursor'] = $cursor;

        $this->cursor = true;

        return $this;
    }

    /**
     * Set to skip status
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
