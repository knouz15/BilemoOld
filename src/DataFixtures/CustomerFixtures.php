<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    public const CUSTOMER_REFERENCE = 'customer_';

    public function load(ObjectManager $manager)
    {
        for($i=0; $i < 10; $i++)
        {
            $customer = (new Customer())
            ->setName('customer_'.$i)
            ->setEmail('customer_'.$i.'@testmail.fr')
            ->setAdress($i+100 . ' Rue de Belleville 22000' )
            ->setPhoneNumber('0100000000');

            $this->addReference(self::CUSTOMER_REFERENCE.$customer->getName(), $customer);

            $manager->persist($customer);            
        }
        
        $manager->flush();
    }
}