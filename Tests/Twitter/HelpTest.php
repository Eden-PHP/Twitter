<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

// class Eden_Twitter_Tests_Twitter_HelpTest extends \PHPUnit_Framework_TestCase
// {
//     public function setUp()
//     {
//         $this->consumerKey = 'QwgkQh3AiloLxQ9PcjqNgA';
//         $this->consumerSecret = 'LNOxfFGIWTzlKSpL23qY28kxLxfwfKBDW3vh1BSw4M';

//         $this->accessToken = '21862667-Prmb3MOGBqFhqtjf2AlHDcq8MwdSocE4t2i1k3DBB';
//         $this->accessSecret = 'jTAEUuy9cSinM5UdAeh345RCjoy0dA7JtYsqzBj9M0';

//         $this->resources = 'help,users,search,statuses';

//     }

//     public function testGetConfiguration()
//     {
//         $configuration = eden('twitter')
//             ->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getConfiguration();
//         $this->assertArrayHasKey('non_username_paths', $configuration);
//     }

//     public function testGetLanguages()
//     {
//         $languages = eden('twitter')
//             ->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getLanguages();
//         $this->assertArrayHasKey('name', $languages[0]);
//     }

//     public function testGetPrivacy()
//     {
//         $privacy = eden('twitter')
//             ->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getPrivacy();
//         $this->assertArrayHasKey('privacy', $privacy);
//     }

//     public function testGetTermsAndCondition()
//     {
//         $terms = eden('twitter')
//             ->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getTermsAndCondition();
//         $this->assertArrayHasKey('tos', $terms);
//     }

//     public function testGetRateLimitStatus($resources = NULL)
//     {
//         $rateLimit = eden('twitter')
//             ->help($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessSecret)
//             ->getRateLimitStatus($this->resources);
//         $this->assertArrayHasKey('resources', $rateLimit);
//     }
// }
