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
 * Twitter spam reporting
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Spam extends Base
{
    const URL_REPORT_SPAM = 'https://api.twitter.com/1.1/users/report_spam.json';

    /**
     * The user specified in the id is blocked by the
     * authenticated user and reported as a spammer
     *
     * @param string|null
     * @param string|null
     * @return array
     */
    public function reportSpam($id = NULL, $name = NULL)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string or null
            ->test(1, 'string', 'null')
            //Argument 2 must be a string or null       
            ->test(2, 'string', 'null');
        
        //if it is not empty
        if(!is_null($id)) {
            //lets put it in query
            $this->query['user_id'] = $id;
        }
        
        //if it is not empty
        if(!is_null($name)) {
            //lets put it in query
            $this->query['screen_name'] = $name;
        }
        
        return $this->post(self::URL_REPORT_SPAM, $this->query);
    }
}
