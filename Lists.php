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
 * Twitter list
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Lists extends Base
{
    const URL_ALL_LIST = 'https://api.twitter.com/1.1/lists/list.json';
    const URL_GET_STATUS = 'https://api.twitter.com/1.1/lists/statuses.json';
    const URL_REMOVE_MEMBER = 'https://api.twitter.com/1.1/lists/members/destroy.json';
    const URL_MEMBERSHIP = 'https://api.twitter.com/1.1/lists/memberships.json';
    const URL_SUBSCRIBER = 'https://api.twitter.com/1.1/lists/subscribers.json';
    const URL_CREATE_SUBCRIBER = 'https://api.twitter.com/1.1/lists/subscribers/create.json';
    const URL_SHOW_SUBSCRIBER = 'https://api.twitter.com/1.1/lists/subscribers/show.json';
    const URL_REMOVE_SUBCRIBER = 'https://api.twitter.com/1.1/lists/subscribers/destroy.json';
    const URL_CREATE_ALL = 'https://api.twitter.com/1.1/lists/members/create_all.json';
    const URL_GET_MEMBER = 'https://api.twitter.com/1.1/lists/members/show.json';
    const URL_GET_DETAIL = 'https://api.twitter.com/1.1/lists/members.json';
    const URL_CREATE_MEMBER = 'https://api.twitter.com/1.1/lists/members/create.json';
    const URL_REMOVE = 'https://api.twitter.com/1.1/lists/destroy.json';
    const URL_UPDATE = 'https://api.twitter.com/1.1/lists/update.json';
    const URL_CREATE_USER = 'https://api.twitter.com/1.1/lists/create.json';
    const URL_SHOW = 'https://api.twitter.com/1.1/lists/show.json';
    const URL_GET_SUBSCRITION = 'https://api.twitter.com/1.1/lists/subscriptions.json';

    /**
     * Add a member to a list. The authenticated user
     * must own the list to be able to add members
     * to it. Note that lists can't have more than 500 members.
     *
     * @param int|string
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function addMember($userId, $listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer or string
            ->test(2, 'int', 'string')
            //Argument 3 must be an integer, null or string
            ->test(3, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        //if it is integer
        if(is_int($userId)) {
            //lets put it in our query
            $this->query['user_id'] = $userId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $userId;
        }

        return $this->post(self::URL_CREATE_MEMBER, $this->query);
    }

    /**
     * Adds multiple members to a list, by specifying a
     * comma-separated list of member ids or screen names.
     *
     * @param int|string list ID or slug
     * @param array list of user IDs
     * @param int|string ownder ID or screen name
     * @return array
     */
    public function addMembers($listId, $userIds, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an array
            ->test(2, 'array')
            //Argument 3 must be an integer or string
            ->test(3, 'int', 'string');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        //if it is integer
        if(is_int($ownerId)) {
            //lets put it in our query
            $this->query['owner_id'] = $ownerId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['owner_screen_name'] = $ownerId;
        }

        //if id is integer
        if(is_int($userIds[0])) {
            //lets put it in query
            $this->query['user_id'] = implode(',',$userIds);
        //if it is streing
        } else {
            //lets put it in query
            $this->query['screen_name'] = implode(',',$userIds);
        }

        return $this->post(self::URL_CREATE_ALL, $this->query);
    }

    /**
     * Creates a new list for the authenticated user.
     * Note that you can't create more than 20 lists per account.
     *
     * @param string
     * @return array
     */
    public function createList($name)
    {
        //argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['name'] = $name;

        return $this->post(self::URL_CREATE_USER, $this->query);
    }

    /**
     * Returns the members of the specified list.
     * Private list members will only be shown if
     * the authenticated user owns the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function getMembers($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->getResponse(self::URL_GET_DETAIL, $this->query);
    }

    /**
     * Returns all lists the authenticating or specified user
     * subscribes to, including their own.
     *
     * @param string|null
     * @return array
     */
    public function getAllLists($id = NULL)
    {
        //Argument 2 must be an integer, null or string
        Argument::i()->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->getResponse(self::URL_ALL_LIST, $this->query);
    }

    /**
     * Returns the specified list. Private lists will only
     * be shown if the authenticated user owns the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function getList($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->getResponse(self::URL_SHOW, $this->query);
    }

    /**
     * Returns the lists the specified user has been
     * added to. If user_id or screen_name are not
     * provided the memberships for the authenticating
     * user are returned.
     *
     * @param int|string|null
     * @return array
     */
    public function getMemberships($id = NULL)
    {
        //Argument 1 must be an integer, null or string
        Argument::i()->test(1, 'int', 'string', 'null');

        if(!is_null($id)) {
            //if it is integer
            if(is_int($id)) {
                //lets put it in our query
                $this->query['user_id'] = $id;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['screen_name'] = $id;
            }
        }

        return $this->getResponse(self::URL_MEMBERSHIP, $this->query);
    }

    /**
     * Returns tweet timeline for members
     * of the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function getTweets($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->getResponse(self::URL_GET_STATUS, $this->query);
    }

    /**
     * Returns the subscribers of the specified list. Private list
     * subscribers will only be shown if the authenticated user owns
     * the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function getSubscribers($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->getResponse(self::URL_SUBSCRIBER, $this->query);
    }

    /**
     * Obtain a collection of the lists the specified user is subscribed to,
     * 20 lists per page by default. Does not include the user's own lists.
     *
     * @param int|string
     * @return array
     */
    public function getSubscriptions($id)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1, 'int', 'string');

        //if it is integer
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->getResponse(self::URL_GET_SUBSCRITION, $this->query);
    }

    /**
     * Will return just lists the authenticating user owns, and the user
     * represented by user_id or screen_name is a member of.
     *
     * @return this
     */
    public function filterToOwn()
    {
        $this->query['filter_to_owned_lists'] = true;
        return $this;
    }

    /**
     * Each tweet will include a node called "entities". This node offers a variety
     * of metadata about the tweet in a discreet structure, including: user_mentions,
     * urls, and hashtags.
     *
     * @return this
     */
    public function includeEntities()
    {
        $this->query['include_entities'] = true;
        return $this;
    }

    /**
     * The list timeline will contain native retweets (if they exist) in addition to the
     * standard stream of tweets. The output format of retweeted tweets is identical to
     * the representation you see in home_timeline.
     *
     * @return this
     */
    public function includeRts()
    {
        $this->query['include_rts'] = true;
        return $this;
    }

    /**
     * Check if the specified user is a member of the specified list.
     *
     * @param int|string
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function isMember($userId, $listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer or string
            ->test(2, 'int', 'string')
            //Argument 3 must be an integer, null or string
            ->test(3, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else if(!is_int($listId)) {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        //if it is integer
        if(is_int($user_id)) {
            //lets put it in our query
            $this->query['user_id'] = $userId;
        //else it is string
        } else if(!is_int($user_id)) {
            //lets put it in our query
            $this->query['screen_name'] = $userId;
        }

        return $this->getResponse(self::URL_GET_MEMBER, $this->query);
    }

    /**
     * Check if the specified user is a subscriber of the specified list.
     * Returns the user if they are subscriber.
     *
     * @param int|string
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function isSubscriber($userId, $listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer or string
            ->test(2, 'int', 'string')
            //Argument 3 must be an integer, null or string
            ->test(3, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        //if it is integer
        if(is_int($userId)) {
            //lets put it in our query
            $query['user_id'] = $userId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $userId;
        }

        return $this->getResponse(self::URL_SHOW_SUBSCRIBER, $this->query);
    }

    /**
     * Deletes the specified list. The authenticated
     * user must own the list to be able to destroy it
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function remove($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $qthis->uery['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->post(self::URL_REMOVE, $this->query);
    }

    /**
     * Removes the specified member from the list.
     * The authenticated user must be the list's
     * owner to remove members from the list.
     *
     * @param int|string
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function removeMember($userId, $listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer or string
            ->test(2, 'int', 'string')
            //Argument 3 must be an integer, null or string
            ->test(3, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        //if it is integer
        if(is_int($userId)) {
            //lets put it in our query
            $this->query['user_id'] = $userId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['screen_name'] = $userId;
        }

        return $this->post(self::URL_REMOVE_MEMBER, $this->query);
    }

    /**
     * Sets count
     *
     * @param integer
     * @return this
     */
    public function setCount($count)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['count'] = $count;

        return $this;
    }

    /**
     * Causes the list of connections to be broken into pages of no more than 5000
     * IDs at a time. The number of IDs returned is not guaranteed to be 5000 as
     * suspended users are filtered out after connections are queried.
     *
     * @param string
     * @return this
     */
    public function setCursor($cursor)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['cursor'] = $cursor;

        return $this;
    }

    /**
     * Set max id
     *
     * @param integer
     * @return this
     */
    public function setMax($max)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['max_id'] = $max;

        return $this;
    }

    /**
     * Sets page
     *
     * @param integer
     * @return this
     */
    public function setPage($perPage)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['per_page'] = $perPage;

        return $this;
    }

    /**
     * Set since id
     *
     * @param integer the tweet ID
     * @return this
     */
    public function setSinceId($sinceId)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['since_id'] = $sinceId;

        return $this;
    }

    /**
     * The description to give the list.
     *
     * @param string
     * @return this
     */
    public function setDescription($description)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');
        $this->query['description'] = $description;

        return $this;
    }

    /**
     * Whether your list is public or private. Values can be public
     * or private. If no mode is specified the list will be public.
     *
     * @return this
     */
    public function setModeToPrivate()
    {
        $this->query['mode'] = 'private';

        return $this;
    }
    /**
     * Statuses will not be included in the returned user objects.
     *
     * @return this
     */
    public function skipStatus()
    {
        $this->query['skip_status'] = true;
        return $this;
    }

    /**
     * Subscribes the authenticated
     * user to the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function subscribe($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->post(self::URL_CREATE_SUBCRIBER, $this->query);
    }

    /**
     * Unsubscribes the authenticated
     * user from the specified list.
     *
     * @param int|string
     * @param int|string|null
     * @return array
     */
    public function unsubscribe($listId, $ownerId = NULL)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an integer, null or string
            ->test(2, 'int', 'string', 'null');

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->post(self::URL_REMOVE_SUBCRIBER, $this->query);
    }

    /**
     * Updates the specified list. The authenticated user must own
     * the list to be able to update it.
     *
     * @param int|string
     * @param string
     * @param string
     * @param int|string|null
     * @param bool
     * @return array
     */
    public function update($listId, $name, $description, $ownerId = NULL, $public = true)
    {
        Argument::i()
            //Argument 1 must be an integer or string
            ->test(1, 'int', 'string')
            //Argument 2 must be an string
            ->test(2, 'string')
            //Argument 3 must be an string
            ->test(3, 'string')
            //Argument 4 must be an integer, string or null
            ->test(4, 'int', 'string', 'null')
            //Argument 3 must be an boolean
            ->test(5, 'bool');

        $this->query['name']            = $name;
        $this->query['description'] = $description;

        //if it is integer
        if(is_int($listId)) {
            //lets put it in our query
            $this->query['list_id'] = $listId;
        //else it is string
        } else {
            //lets put it in our query
            $this->query['slug'] = $listId;
        }

        if(!is_null($ownerId)) {
            //if it is integer
            if(is_int($ownerId)) {
                //lets put it in our query
                $this->query['owner_id'] = $ownerId;
            //else it is string
            } else {
                //lets put it in our query
                $this->query['owner_screen_name'] = $ownerId;
            }
        }

        return $this->post(self::URL_UPDATE, $this->query);
    }
}
