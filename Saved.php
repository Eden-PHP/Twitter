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
 * Twitter saved searches
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Saved extends Base
{
    const URL_SAVED_SEARCHES = 'https://api.twitter.com/1.1/saved_searches/list.json';
    const URL_GET_DETAIL = 'https://api.twitter.com/1.1/saved_searches/show/%d.json';
    const URL_CREATE_SEARCH = 'https://api.twitter.com/1.1/saved_searches/create.json';
    const URL_REMOVE = 'https://api.twitter.com/1.1/saved_searches/destroy/%d.json';

    /**
     * Create a new saved search for the authenticated user.
     * A user may only have 25 saved searches.
     *
     * @param string
     * @return array
     */
    public function createSearch($query)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'string');

        $this->query['query'] = $query;

        return $this->post(self::URL_CREATE_SEARCH, $this->query);
    }

    /**
     * Retrieve the information for the saved search represented
     * by the given id. The authenticating user must be the
     * owner of saved search ID being requested.
     *
     * @param int
     * @return array
     */
    public function getDetail($id)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'int');

        return $this->getResponse(sprintf(self::URL_GET_DETAIL, $id));
    }

    /**
     * Returns the authenticated user's
     * saved search queries.
     *
     * @return array
     */
    public function getSavedSearches()
    {
        return $this->getResponse(self::URL_SAVED_SEARCHES);
    }

    /**
     * Destroys a saved search for the authenticating user.
     * The authenticating user must be the owner of
     * saved search id being destroyed.
     *
     * @param int
     * @return array
     */
    public function remove($id)
    {
        //Argument 1 must be a integer
        Argument::i()->test(1, 'int');

        return $this->post(sprintf(self::URL_REMOVE, $id));
    }
}
