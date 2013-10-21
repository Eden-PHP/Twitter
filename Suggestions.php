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
 * Twitter suggestion
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Suggestions extends Base
{
    const URL_GET_CATEGORY = 'https://api.twitter.com/1.1/users/suggestions/%s.json';
    const URL_FAVORITES = 'https://api.twitter.com/1.1/favorites/list.json';
    const URL_SUGGESTIONS = 'https://api.twitter.com/1.1/users/suggestions/%s/members.json';

    /**
     * Access the users in a given category of the
     * Twitter suggested user list.
     *
     * @param string
     * @param string|null
     * @return array
     */
    public function getCategory($slug, $lang = NULL)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'null');

        //if it is not empty
        if(!is_null($lang)) {
            //lets put it in our query
            $this->query['lang'] = $lang;
        }

        return $this->getResponse(sprintf(self::URL_GET_CATEGORY, $slug), $this->query);
    }

    /**
     * Returns the 20 most recent Tweets favorited by the authenticating or specified user.
     *
     * @param string|integer|null
     * @return array
     */
    public function getFavorites($id = NULL)
    {
        //Argument 1 must be a string , integer or null
        Argument::i()->test(1, 'string', 'int', 'null');

        //if it is integet
        if(is_int($id)) {
            //lets put it in our query
            $this->query['user_id'] = $id;
        }

        //if it is string
        if(is_string($id)) {
            //lets put it in our query
            $this->query['screen_name'] = $id;
        }

        return $this->getResponse(self::URL_FAVORITES, $this->query);
    }

    /**
     * Access the users in a given category of the Twitter suggested user list
     * and return their most recent status if they are not a protected user.
     *
     * @param string
     * @return array
     */
    public function getUserByStatus($slug)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        return $this->getResponse(sprintf(self::URL_SUGGESTIONS, $slug));
    }

    /**
     * Set count
     *
     * @param integer
     * @return this
     */
    public function setCount($count)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'int');

        $this->query['count'] = $count;

        return $this;
    }

    /**
     * Set Since Id
     *
     * @param integer
     * @return this
     */
    public function setSinceId($sinceId)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'int');

        $this->query['since_id'] = $sinceId;

        return $this;
    }

    /**
     * Set Max Id
     *
     * @param integer
     * @return this
     */
    public function setMaxId($maxId)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'int');

        $this->query['max_id'] = $maxId;

        return $this;
    }

    /**
     * The entities node will be omitted when set to false
     *
     * @return this
     */
    public function includeEntities()
    {
        $this->query['include_entities'] = false;

        return $this;
    }
}
