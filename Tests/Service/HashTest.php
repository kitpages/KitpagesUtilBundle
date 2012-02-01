<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kitpages\UtilBundle\Tests\Service;

use Kitpages\UtilBundle\Service\Hash;

class HashTest extends \PHPUnit_Framework_TestCase
{
    public function testHash()
    {
        $hash = new Hash('My Pass Phrase');
        $encrypted = $hash->getHash("titi", null, "toto", array("tutu", 'truc'));
        $this->assertTrue( $hash->checkHash($encrypted, "titi", null, "toto", array("tutu", 'truc')) );
        $this->assertFalse( $hash->checkHash("tutu", "titi", null, "toto", array("tutu", 'truc')) );
    }
}
