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
 * Twitter timelines v1.1
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Timeline extends Base
{
    const URL_TIMELINES_MENTION = 'https://api.twitter.com/1.1/statuses/mentions_timeline.json';
    const URL_TIMELINES_USER = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    const URL_TIMELINES_HOME = 'https://api.twitter.com/1.1/statuses/home_timeline.json';

    /**
     * Returns the 20 most recent mentions (status containing @username)
     * for the authenticating user. The timeline returned is the equivalent <br />
     * of the one seen when you view your mentions on twitter.com.
     *
     * @return array
     */
    public function getMentionTimeline()
    {

        return $this->getResponse(self::URL_TIMELINES_MENTION, $this->query);
    }

    /**
     * Returns a collection of the most recent Tweets posted by the user indicated by
     * the screen_name or user_id parameters.
     *
     * @param string|integer|null
     * @return array
     */
    public function getUserTimelines($id = NULL)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');

        //if id is integer
        if(is_int($id)) {
            //set it as user id
            $this->query['user_id'] = $id;
        //else it is string
        } else {
            //set it as screen name
            $this->query['screen_name'] = $id;
        }

        return $this->getResponse(self::URL_TIMELINES_USER, $this->query);
    }

    /**
     * Returns a collection of the most recent Tweets and retweets posted by
     * the authenticating user and the users they follow.
     *
     * @return array
     */
    public function getYourTimeLine()
    {
        return $this->getResponse(self::URL_TIMELINES_MENTION, $this->query);
    }

    /**
     * Returns results with an ID greater than (that is,
     * more recent than) the specified ID.
     *
     * @return this
     */
    public function setSinceId($sinceId)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');
        $this->query['since_id'] = $sinceId;

        return $this;
    }

    /**
     * Specifies the number of tweets to try and retrieve, up to a
     * maximum of 200 per distinct request
     *
     * @param string
     * @return this
     */
    public function setCount($count)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');
        $this->query['count'] = $count;

        return $this;
    }

    /**
     * Specifies the number of tweets to try and retrieve, up to a
     * maximum of 200 per distinct request
     *
     * @param string
     * @return this
     */
    public function setMaxId($maxId)
    {
        //Argument 1 must be an integer or string
        Argument::i()->test(1,'int', 'string');
        $this->query['max_id'] = $maxId;

        return $this;
    }

    /**
     * When set to either true, t or 1, each tweet returned in a timeline will include
     * a user object including only the status authors numerical ID
     *
     * @return this
     */
    public function trimUser()
    {
        $this->query['trim_user'] = true;

        return $this;
    }

    /**
     * This parameter will prevent replies from appearing in the returned timeline
     *
     * @return this
     */
    public function excludeReplies()
    {
        $this->query['exclude_replies'] = true;

        return $this;
    }

    /**
     * This parameter enhances the contributors element of the status response to
     * include the screen_name of the contributor
     *
     * @return this
     */
    public function setContributorDetails()
    {
        $this->query['contributor_details'] = true;

        return $this;
    }

    /**
     * When set to false, the timeline will strip any native retweets
     *
     * @return this
     */
    public function includeRts()
    {
        $this->query['include_rts'] = false;

        return $this;
    }
}
