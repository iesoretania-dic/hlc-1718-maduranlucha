<?php


namespace AppBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class LoadUsuariosData extends Fixture

{
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml',$manager,
        [
            'providers' => [$this]
        ]);
    }

    public function codificaPassword($textoPlano)
    {
        return $this->userPasswordEncoder->encodePassword(new Usuario(), $textoPlano);
    }
}