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
 * Twitter help
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Help extends Base
{
    const URL_CONFIGURATION = 'https://api.twitter.com/1.1/help/configuration.json';
    const URL_LANGUAGES     = 'https://api.twitter.com/1.1/help/languages.json';
    const URL_PRIVACY       = 'https://api.twitter.com/1.1/help/privacy.json';
    const URL_TOS           = 'https://api.twitter.com/1.1/help/tos.json';
    const URL_RATE_LIMIT    = 'https://api.twitter.com/1.1/application/rate_limit_status.json';

    /**
     * Returns the current configuration used by
     * Twitter including twitter.com slugs which
     * are not usernames, maximum photo resolutions,
     * and t.co URL lengths.
     *
     * @return array
     */
    public function getConfiguration()
    {
        return $this->getResponse(self::URL_CONFIGURATION);
    }

    /**
     * Returns the Twitter Terms of Service in the requested format.
     * These are not the same as the Developer Rules of the Road.
     *
     * @return array
     */
    public function getLanguages()
    {
        return $this->getResponse(self::URL_LANGUAGES);
    }

    /**
     * Returns Twitter's Privacy Policy.
     *
     * @return array
     */
    public function getPrivacy()
    {
        return $this->getResponse(self::URL_PRIVACY);
    }

    /**
     * Returns Twitter's Privacy Policy.
     *
     * @return array
     */
    public function getTermsAndCondition()
    {
        return $this->getResponse(self::URL_TOS);
    }
    /**
     * Returns the current rate limits for methods belonging to the specified resource families.
     *
     * @return array
     */
    public function getRateLimitStatus($resources = NULL)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string', 'null');

        $this->query['resources'] = $resources;

        return $this->getResponse(self::URL_RATE_LIMIT, $this->query);
    }
}
