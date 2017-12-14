<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 14/12/17
 * Time: 13:59
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;




class LoadUsuariosData implements FixtureInterface

{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml',$manager);
    }
}