<?php 

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAdminController extends EasyAdminController
{

	private $encoder;
	public function __construct(UserPasswordEncoderInterface $encoder){
		$this->encoder = $encoder;
	}

    public function persistEntity($entity)
    {
    	$entity->setPassword($this->encoder->encodePassword($entity, $entity->getPassword()));
        parent::persistEntity($entity);
    }

    public function updateEntity($entity)
    {

    	$entity->setPassword($this->encoder->encodePassword($entity, $entity->getPassword()));
        parent::updateEntity($entity);
    }

}