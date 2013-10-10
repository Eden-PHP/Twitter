<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

// class Eden_Twitter_Tests_Twitter_FavoritesTest extends \PHPUnit_Framework_TestCase
// {
//     public function setUp()
//     {
//         $this->consumerKey = 'QwgkQh3AiloLxQ9PcjqNgA';
//         $this->consumerSecret = 'LNOxfFGIWTzlKSpL23qY28kxLxfwfKBDW3vh1BSw4M';

//         $this->accessToken = '21862667-Prmb3MOGBqFhqtjf2AlHDcq8MwdSocE4t2i1k3DBB';
//         $this->accessSecret = 'jTAEUuy9cSinM5UdAeh345RCjoy0dA7JtYsqzBj9M0';

//         $this->id = '243138128959913986';
//         $this->count = '1';
//         $this->sinceId = '384627494474616832';
//         $this->maxId = '384627494474616832';
//         $this->page = '1';
//     }

//     public function testAddFavorites()
//     {
//         $favorites = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->addFavorites($this->id);
//         $this->assertArrayHasKey('user', $favorites);
//     }

//     public function testGetList()
//     {
//         $list = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getList();
//         $this->assertArrayHasKey('user', $list[0]);
//     }

//     public function testRemove()
//     {
//         $remove = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->remove($this->id);
//         $this->assertArrayHasKey('id', $remove);
//     }

//     public function testSetUserId()
//     {
//         $userId = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->setUserId($this->id);

//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $userId);
//     }

//     public function testSetCount()
//     {
//         $count = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->setCount($this->count);
//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $count);
//     }

//     public function testSetSinceId()
//     {
//         $since = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->setSinceId($this->sinceId);
//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $since);
//     }

//     public function testSetMaxId()
//     {
//         $max = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->setMaxId($this->maxId);
//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $max);
//     }

//     public function testSetPage()
//     {
//         $page = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->setPage($this->page);
//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $page);
//     }

//     public function testIncludeEntities()
//     {
//         $entities = eden('twitter')
//             ->favorites($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->includeEntities($this->count);
//         $this->assertInstanceOf('Eden\\Twitter\\Favorites', $entities);
//     }
// }
