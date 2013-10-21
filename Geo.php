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
 * Twitter places and geo
 *
 * @vendor Eden
 * @package Twitter
 * @author Federico A. Maglayon rmaglayon@gmail.com
 */
class Geo extends Base
{
    const URL_GET_PLACE = 'https://api.twitter.com/1.1/geo/id/%s.json';
    const URL_GET_GEOCODE = 'https://api.twitter.com/1.1/geo/reverse_geocode.json';
    const URL_SEARCH = 'https://api.twitter.com/1.1/geo/search.json';
    const URL_GET_SIMILAR_PLACES = 'https://api.twitter.com/1.1/geo/similar_places.json';
    const URL_CREATE_PLACE = 'https://api.twitter.com/1.1/geo/place.json';

    /**
     * Creates a new place object at the given
     * latitude and longitude.
     *
     * @param string
     * @param string
     * @param string
     * @param float|integer
     * @param float|integer
     * @return array
     */
    public function createPlace($name, $contained, $token, $latitude, $longtitude)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string')
            //Argument 4 must be a float or integer
            ->test(4, 'float', 'int')
            //Argument 5 must be a float or integer
            ->test(5, 'float', 'int');

        //populate fields
        $this->query['lat'] = $latitude;
        $this->query['long'] = $longtitude;
        $this->query['name'] = $name;
        $this->query['token'] = $token;
        $this->query['contained_within'] = $contained;

        return $this->post(self::URL_CREATE_PLACE, $this->query);
    }

    /**
     * Given a latitude and a longitude, searches
     * for up to 20 places that can be used as a
     * place_id when updating a status
     *
     * @param float|integer
     * @param float|integer
     * @return array
     */
    public function getGeocode($lat, $long)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a float or integer
            ->test(1, 'float', 'int')
            //Argument 2 must be a float or integer
            ->test(2, 'float', 'int');

        //populate fields
        $this->query['lat'] = $latitude;
        $this->query['long'] = $longtitude;

        return $this->getResponse(self::URL_GET_GEOCODE, $this->query);
    }

    /**
     * Returns all the information about a known place.
     *
     * @param int
     * @return array
     */
    public function getPlace($id)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'string');

        return $this->getResponse(sprintf(self::URL_GET_PLACE, $id));
    }

    /**
     * Locates places near the given coordinates
     * which are similar in name.
     *
     * @param float|int
     * @param float|int
     * @param string
     * @return array
     */
    public function getSimilarPlaces($latitude, $longtitude, $name)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a float or int
            ->test(1, 'float', 'int')
            //Argument 2 must be a float or int
            ->test(2, 'float', 'int')
            //Argument 3 must be a string
            ->test(3, 'string');

        //populate fields
        $this->query['lat'] = $latitude;
        $this->query['long']    = $longtitude;
        $this->query['name']    = $name;

        return $this->getResponse(self::URL_GET_SIMILAR_PLACES, $this->query);
    }

    /**
     * Search for places that can be attached
     * to a statuses/update.
     *
     * @param string|null
     * @return array
     */
    public function search($query = NULL)
    {
        //Argument 1 must be a string or null
        Argument::i()->test(1, 'string', 'null');

        $this->query['query'] = $query;

        return $this->getResponse(self::URL_SEARCH, $this->query);
    }

    /**
     * This is the minimal granularity of place types to return and must be one
     * of: poi, neighborhood, city, admin or country. If no granularity is
     * provided for the request neighborhood is assumed. Setting this to city,
     * for example, will find places which have a type of city, admin or country
     *
     * @param string
     * @return this
     */
    public function setAccuracy($accuracy)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['accuracy'] = $accuracy;

        return $this;
    }

    /**
     * This parameter searches for places which have this given street address.
     * There are other well-known, and application specific attributes available.
     * Custom attributes are also permitted.
     *
     * @param string
     * @return this
     */
    public function setAddress($address)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['attribute:street_address'] = $address;

        return $this;
    }

    /**
     * If supplied, the response will use the JSONP format with a callback of the given name.
     *
     * @param string
     * @return this
     */
    public function setCallback($callback)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['callback'] = $callback;

        return $this;
    }

    /**
     * This is the place_id which you would like to restrict the search results to.
     * Setting this value means only places within the given place_id will be found.
     * Specify a place_id. For example, to scope all results to places within
     * "San Francisco, CA USA", you would specify a place_id of "5a110d312052166f"
     *
     * @param string
     * @return this
     */
    public function setContained($contained)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['contained_within'] = $contained;

        return $this;
    }

    /**
     * This is the minimal granularity of place types to return and must be
     * one of: poi, neighborhood, city, admin or country. If no granularity
     * is provided for the request neighborhood is assumed. Setting this to
     * city, for example, will find places which have a type of city, admin
     * or country.
     *
     * @param string
     * @return this
     */
    public function setGranularity($granularity)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['granularity'] = $granularity;

        return $this;
    }

    /**
     * An IP address. Used when attempting to fix geolocation based off of the
     * user's IP address.
     *
     * @param string
     * @return this
     */
    public function setIp($ip)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');
        $this->query['ip'] = $ip;

        return $this;
    }

    /**
     * The latitude to search around. This parameter will be ignored unless it
     * is inside the range -90.0 to +90.0 (North is positive) inclusive. It will
     * also be ignored if there isn't a corresponding long parameter.
     *
     * @param int|float
     * @return this
     */
    public function setLatitude($latitude)
    {
        //Argument 1 must be a integer or float
        Argument::i()->test(1, 'int', 'float');
        $this->query['lat'] = $latitude;

        return $this;
    }

    /**
     * The longitude to search around. The valid ranges for longitude is -180.0
     * to +180.0 (East is positive) inclusive. This parameter will be ignored
     * if outside that range, if it is not a number, if geo_enabled is disabled,
     * or if there not a corresponding lat parameter.
     *
     * @param int|float
     * @return this
     */
    public function setLongtitude($longtitude)
    {
        //Argument 1 must be a integer or float
        Argument::i()->test(1, 'int', 'float');
        $this->query['long'] = $longtitude;

        return $this;
    }

    /**
     * A hint as to the number of results to return. This does not guarantee
     * that the number of results returned will equal max_results, but instead
     * informs how many "nearby" results to return. Ideally, only pass in the
     * number of places you intend to display to the user here.
     *
     * @param integer
     * @return this
     */
    public function setMaxResults($maxResults)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');
        $this->query['max_results'] = $maxResults;

        return $this;
    }
}
