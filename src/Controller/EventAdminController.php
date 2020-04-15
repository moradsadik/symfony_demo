<?php 

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EventAdminController extends EasyAdminController
{

    public function persistEntity($entity)
    {
        parent::persistEntity($entity);
    }

    public function updateEntity($entity)
    {

        parent::updateEntity($entity);
    }

}