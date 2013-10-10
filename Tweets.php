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
 * Twitter tweets v1.1
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Tweets extends Base
{
    const URL_TWEETS_GET_RETWEET = 'https://api.twitter.com/1.1/statuses/retweets/%s.json';
    const URL_TWEETS_GET_TWEET = 'https://api.twitter.com/1.1/statuses/show.json';
    const URL_TWEETS_REMOVE_TWEET = 'https://api.twitter.com/1.1/statuses/destroy/%s.json';
    const URL_TWEETS_TWEET = 'https://api.twitter.com/1.1/statuses/update.json';
    const URL_TWEETS_RETWEET = 'https://api.twitter.com/1.1/statuses/retweet/%s.json';
    const URL_TWEETS_TWEET_MEDIA = 'https://api.twitter.com/1.1/statuses/update_with_media.json';

    /**
     * Returns up to 100 of the first retweets of a given tweet.
     *
     * @param string|int
     * @return array
     */
    public function getRetweet($id)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        return $this->getResponse(sprintf(self::URL_TWEETS_GET_RETWEET, $id), $this->query);
    }

    /**
     * Returns a single Tweet, specified by the id parameter. The Tweet's author will
     * also be embedded within the tweet.
     *
     * @param string|int
     * @return array
     */
    public function getTweet($id)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        $this->query['id'] = $id;

        return $this->getResponse(self::URL_TWEETS_GET_TWEET, $this->query);
    }

    /**
     * Destroys the status specified by the required ID parameter. The authenticating
     * user must be the author of the specified status. Returns the destroyed status if successful.
     *
     * @param string|int
     * @return array
     */
    public function removeTweet($id)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        return $this->post(sprintf(self::URL_TWEETS_REMOVE_TWEET, $id), $this->query);
    }

    /**
     * Updates the authenticating user's current status, also known as tweeting.
     *
     * @param string
     * @return array
     */
    public function tweet($status)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['status'] = $status;

        return $this->post(self::URL_TWEETS_TWEET, $this->query);
    }

    /**
     * Retweets a tweet. Returns the original tweet with retweet details embedded.
     *
     * @param string
     * @return array
     */
    public function retweet($tweetId)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        return $this->post(sprintf(self::URL_TWEETS_RETWEET, $tweetId), $this->query);
    }

    /**
     * Updates the authenticating user's current status and attaches media for upload.
     * In other words, it creates a Tweet with a picture attached.
     *
     * @param string
     * @param string
     * @return array
     */
    public function tweetMedia($status, $media)
    {
        //Argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string');

        $this->query['status']      = $status;
        $this->query['media[]'] = $media;

        return $this->upload(self::URL_TWEETS_TWEET_MEDIA, $this->query);
    }

    /**
     * The ID of an existing status that the update is in reply to.
     *
     * @param string
     * @return this
     */
    public function inReplyToStatusId($statusId)
    {
        //Argument 1 must be a string
        Argument::i()->test(1,'string');

        $this->query['in_reply_to_status_id'] = $statusId;

        return $this;
    }

    /**
     * The latitude of the location this tweet refers to. This parameter will be ignored
     * unless it is inside the range -90.0 to +90.0 (North is positive) inclusive. It will
     * also be ignored if there isn't a corresponding long parameter.
     *
     * @param float
     * @return this
     */
    public function setLatitude($latutide)
    {
        //Argument 1 must be a float
        Argument::i()->test(1,'float');

        $this->query['lat'] = $latutide;

        return $this;
    }

    /**
     * The longitude of the location this tweet refers to. The valid ranges for longitude
     * is -180.0 to +180.0 (East is positive) inclusive. This parameter will be ignored if
     * outside that range, if it is not a number, if geo_enabled is disabled, or if there
     * not a corresponding lat parameter.
     *
     * @param float
     * @return this
     */
    public function setLongtitude($longtitude)
    {
        //Argument 1 must be a float
        Argument::i()->test(1,'float');

        $this->query['long'] = $longtitude;

        return $this;
    }

    /**
     * A place in the world. These IDs can be retrieved from GET geo/reverse_geocode.
     *
     * @param string
     * @return this
     */
    public function setPlaceId($placeId)
    {
        //Argument 1 must be a string
        Argument::i()->test(1,'string');

        $this->query['place_id'] = $placeId;

        return $this;
    }

    /**
     * Specifies the number of records to retrieve. Must be less than or equal to 100.
     *
     * @param integer
     * @return this
     */
    public function setCount($count)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1,'int');

        //Prevent sending number greater that 100
        if($count <= 100) {
            $this->query['count'] = $count;
        } else {
            $this->query['count'] = 100;
        }

        return $this;
    }

    /**
     * When set to either true, t or 1, each tweet returned in a timeline will
     * include a user object including only the status authors numerical ID
     *
     * @return this
     */
    public function displayCoordinates()
    {
        $this->query['display_coordinates'] = true;

        return $this;
    }

    /**
     * When set to either true, t or 1, each tweet returned in a timeline will
     * include a user object including only the status authors numerical ID
     *
     * @return this
     */
    public function trimUser()
    {
        $this->query['trim_user'] = true;

        return $this;
    }

    /**
     * The entities node will be disincluded when set to false
     *
     * @return this
     */
    public function includeEntities()
    {
        $this->query['include_entities'] = false;

        return $this;
    }

    /**
     * When set to either true, t or 1, any Tweets returned that have been retweeted
     * by the authenticating user will include an additional current_user_retweet
     * node, containing the ID of the source status for the retweet.
     *
     * @return this
     */
    public function includeMyRetweet()
    {
        $this->query['include_my_retweet'] = true;

        return $this;
    }

    /**
     * For content which may not be suitable for every audience.
     *
     * @return this
     */
    public function possiblySensitive()
    {
        $this->query['possibly_sensitive'] = true;

        return $this;
    }
}
