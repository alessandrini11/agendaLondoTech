<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Invite;
use App\Entity\Priority;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $hasher)
    {
        $this->encoder = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        $users = [];
        $events = [];
        $invites = [];
        $priorities = [];

        for ($i = 0; $i < 10; $i++)
        {
            $invite = new Invite();
            $invite->setName($faker->lastName);
            $manager->persist($invite);
            $invites[] = $invite;
        }
        for ($i = 0; $i < 5; $i++)
        {
            $prio = new Priority();
            $prio->setName($faker->randomElement(['crucial','important','sans importance']));
            $manager->persist($prio);
            $priorities[] = $prio;
        }
        for ($i = 0; $i < 10; $i++)
        {
            $inviteE = $invites[mt_rand(0,count($invites) - 1)];
            $prioE = $priorities[mt_rand(0,count($priorities) - 1)];
            $event = new Evenement();
            $event->setDate($faker->dateTime)
                ->setPersonne("monthé")
                ->addInvite($inviteE)
                ->setTitle($faker->title)
                ->setPriority($prioE)
                ;
            $manager->persist($event);
        }
        $user = new User();
        $user->setEmail('test@londo.cm')
            ->setNom($faker->userName)
            ->setPassword($this->encoder->encodePassword($user,'demo'));

        $manager->persist($user);
        $manager->flush();
    }
}
