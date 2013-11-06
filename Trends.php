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
 * Twitter trends
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Trends extends Base
{
    const URL_TRENDING_PLACE = 'https://api.twitter.com/1.1/trends/place.json';
    const URL_TRENDING_AVAILABLE = 'https://api.twitter.com/1.1/trends/available.json';
    const URL_TRENDING_CLOSEST = 'https://api.twitter.com/1.1/trends/closest.json';

    /**
     * Returns the top 10 trending topics for a specific WOEID, if trending
     * information is available for it.
     *
     * @param string|integer
     * @return array
     */
    public function getPlaceTrending($id)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'string', 'int');

        $this->query['id'] = $id;

        return $this->getResponse(self::URL_TRENDING_PLACE, $this->query);
    }

    /**
     * Returns the locations that Twitter has trending topic information for.
     *
     * @return array
     */
    public function getAvailableTrending()
    {
        return $this->getResponse(self::URL_TRENDING_AVAILABLE);
    }

    /**
     * Returns the locations that Twitter has trending topic information for, closest to a specified location.
     *
     * @param float|null
     * @param float|null
     * @return array
     */
    public function getClosestTrending($lat = NULL, $long = NULL)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a float or null
            ->test(1, 'float', 'null')
            //Argument 2 must be a float or null
            ->test(2, 'float', 'null');

        //if it is not empty
        if(!is_null($lat)) {
            //lets put it in query
            $this->query['lat'] = $lat;
        }

        //if it is not empty
        if(!is_null($long)) {
            //lets put it in query
            $this->query['long'] = $long;
        }

        return $this->getResponse(self::URL_TRENDING_CLOSEST, $this->query);
    }
}
