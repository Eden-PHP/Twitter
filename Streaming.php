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
 * Twitter streaming
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Streaming extends Base
{
    const URL_STREAM_PUBLIC_STATUS = 'https://stream.twitter.com/1.1/statuses/filter.json';
    const URL_STREAM_RANDOM_STATUS = 'https://stream.twitter.com/1.1/statuses/sample.json';
    const URL_STREAM_FIRE_HOSE = 'https://stream.twitter.com/1.1/statuses/firehose.json';
    const URL_STREAM_USER_MESSAGE = 'https://userstream.twitter.com/1.1/user.json';
    const URL_STREAM_SITE = 'https://sitestream.twitter.com/1.1/site.json';

    /**
     * Returns public statuses that match one or more filter predicates
     *
     * @return array
     */
    public function streamPublicStatus()
    {
        return $this->post(self::URL_STREAM_PUBLIC_STATUS, $this->query);
    }

    /**
     * Returns a small random sample of all public statuses. The Tweets returned by
     * the default access level are the same, so if two different clients connect to
     * this endpoint, they will see the same Tweets.
     *
     * @return array
     */
    public function streamRandomStatus()
    {
        return $this->getResponse(self::URL_STREAM_RANDOM_STATUS, $this->query);
    }

    /**
     * Returns all public statuses. Few applications require this level of access.
     * Creative use of a combination of other resources and various access levels
     * can satisfy nearly every application use case.
     *
     * @return array
     */
    public function fireHose()
    {
        return $this->getResponse(self::URL_STREAM_FIRE_HOSE, $this->query);
    }

    /**
     * Streams messages for a single user, as described in User streams.
     *
     * @return array
     */
    public function streamMessage()
    {
        return $this->getResponse(self::URL_STREAM_FIRE_HOSE, $this->query);
    }

    /**
     * Streams messages for a set of users
     *
     * @return array
     */
    public function streamSite()
    {
        return $this->getResponse(self::URL_STREAM_SITE, $this->query);
    }

    /**
     * Include messages from accounts the user follows
     *
     * @param integer
     * @return this
     */
    public function streamWithFollowings()
    {
        $this->query['with'] = 'followings';

        return $this;
    }

    /**
     * By default @replies are only sent if the current user follows both the sender
     * and receiver of the reply. For example, consider the case where Alice follows Bob,
     * but Alice doesn’t follow Carol. By default, if Bob @replies Carol, Alice does not
     * see the Tweet. This mimics twitter.com and api.twitter.com behavior.
     *
     * @param integer
     * @return this
     */
    public function streamWithReplies()
    {
        $this->query['replies'] = 'all';

        return $this;
    }

    /**
     * The number of messages to backfill. The supplied value may be an integer
     * from 1 to 150000 or from -1 to -150000
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
     * Indicating the users to return statuses for in the stream
     *
     * @param string|array
     * @return this
     */
    public function setFollow($follow)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'array');

        //if it is array
        if(is_array($follow)) {
            $this->query['follow'] = implode(',', $follow);
        //else it is string
        } else {
            $this->query['follow'] = $follow;
        }

        return $this;
    }

    /**
     * Keywords to track. Phrases of keywords are specified by a comma-separated list.
     *
     * @param string|array
     * @return this
     */
    public function setTrack($track)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'array');

        //if it is array
        if(is_array($track)) {
            $this->query['track'] = implode(',', $track);
        //else it is string
        } else {
            $this->query['track'] = $track;
        }

        return $this;
    }

    /**
     * Keywords to track. Phrases of keywords are specified by a comma-separated list.
     *
     * @param string|array
     * @return this
     */
    public function setLocation($locations)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'array');

        //if it is array
        if(is_array($track)) {
            $this->query['locations'] = implode(',', $locations);
        //else it is string
        } else {
            $this->query['locations'] = $locations;
        }

        return $this;
    }

    /**
     * Specifies whether messages should be length-delimited
     *
     * @return this
     */
    public function setDelimited()
    {
        $this->query['delimited'] = 'length';

        return $this;
    }

    /**
     * Specifies whether stall warnings should be delivered
     *
     * @return this
     */
    public function setStallWarning()
    {
        $this->query['stall_warnings'] = true;

        return $this;
    }
}
