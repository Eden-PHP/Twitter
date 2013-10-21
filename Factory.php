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

/**
 * Twitter API factory. This is a factory class with
 * methods that will load up different twitter classes.
 * Twitter classes are organized as described on their
 * developer site: account, block, direct message, favorites, friends, geo,
 * help, legal, list, local trends, notification, saved searches, search, spam,
 * suggestions, timelines, trends, tweets and users.
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Factory extends CoreBase
{
    const INSTANCE = 1;

    /**
     * Returns twitter oauth method
     *
     * @param *string
     * @param *string
     * @return Oauth
     */
    public function auth($key, $secret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string');

        return Oauth::i($key, $secret);
    }

    /**
     * Returns twitter direct message method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Directmessage
     */
    public function directMessage($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Directmessage::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter favorites method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Favorites
     */
    public function favorites($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Favorites::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter friends method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Friends
     */
    public function friends($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Friends::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter geo method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Geo
     */
    public function geo($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Geo::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter help method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Help
     */
    public function help($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Help::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter list method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return List
     */
    public function lists($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Lists::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter saved method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Saved
     */
    public function saved($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Saved::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter search method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Search
     */
    public function search($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Search::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter spam method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Spam
     */
    public function spam($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Spam::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter spam method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Spam
     */
    public function streaming($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Streaming::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter suggestions method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Suggestions
     */
    public function suggestions($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Suggestions::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter timelines method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Timeline
     */
    public function timeline($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Timeline::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter trends method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Trends
     */
    public function trends($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Trends::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter tweets method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Tweets
     */
    public function tweets($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Tweets::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }

    /**
     * Returns twitter users method
     *
     * @param *string
     * @param *string
     * @param *string
     * @param *string
     * @return Users
     */
    public function users($consumerKey, $consumerSecret, $accessToken, $accessSecret)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a string
            ->test(4, 'string');

        return Users::i($consumerKey, $consumerSecret, $accessToken, $accessSecret);
    }
}
