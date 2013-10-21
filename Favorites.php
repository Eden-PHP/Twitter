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
 * Twitter favorites
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Favorites extends Base
{
    const URL_GET_FAVORITES = 'https://api.twitter.com/1.1/favorites/list.json';
    const URL_FAVORITE_STATUS = 'https://api.twitter.com/1.1/favorites/create.json';
    const URL_UNFAVORITE_STATUS = 'https://api.twitter.com/1.1/favorites/destroy.json';

    /**
     * Favorites the status specified in the ID parameter as
     * the authenticating user.
     *
     * @param int
     * @return array
     */
    public function addFavorites($id)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');

        $this->query['id'] = $id;

        return $this->post(self::URL_FAVORITE_STATUS, $this->query);
    }

    /**
     * Returns the 20 most recent favorite statuses for the authenticating
     * user or user specified by the ID parameter in the requested format.
     *
     * @return array
     */
    public function getList()
    {
        return $this->getResponse(self::URL_GET_FAVORITES, $this->query);
    }

    /**
     * Un-favorites the status specified in the ID
     * parameter as the authenticating user.
     *
     * @param int
     * @return array
     */
    public function remove($id)
    {
        //Argument 1 must be na integer
        Argument::i()->test(1, 'int');

        $this->query['id'] = $id;

        return $this->post(self::URL_UNFAVORITE_STATUS, $this->query);
    }

    /**
     * The ID of the user for whom to return results for. Either an
     * id or screen_name is required for this method.
     *
     * @param int|string
     * @return this
     */
    public function setUserId($id)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int', 'string');

        //if id is integer
        if(is_int($id)) {
            $this->query['user_id'] = $id;
        } else {
            $this->query['screen_name'] = $id;
        }

        return $this;
    }

    /**
     * Specifies the number of records to retrieve. Must be less than
     * or equal to 200. Defaults to 20.
     *
     * @param int|string
     * @return this
     */
    public function setCount($count)
    {
        //Argument 1 must be na integer
        Argument::i()->test(1, 'int', 'string');
        $this->query['count'] = $count;

        return $this;
    }

    /**
     * Returns results with an ID greater than (that is, more recent than) the specified ID.
     * There are limits to the number of Tweets which can be accessed through the API. If
     * the limit of Tweets has occured since the since_id, the since_id will be forced
     * to the oldest ID available.
     *
     * @param int
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
     * Returns results with an ID less than (that is, older than) or
     * equal to the specified ID.
     *
     * @param int
     * @return this
     */
    public function setMaxId($maxId)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['max_id'] = $maxId;

        return $this;
    }

    /**
     * Specifies the page of results to retrieve.
     *
     * @param int
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
     * When set to either true, t or 1, each tweet will include a node called "entities,".
     * This node offers a variety of metadata about the tweet in a discreet structure,
     * including: user_mentions, urls, and hashtags. While entities are opt-in on
     * timelines at present, they will be made a default component of output in the
     * future. See Tweet Entities for more detail on entities.
     *
     * @return this
     */
    public function includeEntities()
    {
        $this->query['include_entities'] = true;

        return $this;
    }
}
