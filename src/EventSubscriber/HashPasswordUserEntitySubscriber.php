<?php 
namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class HashPasswordUserEntitySubscriber implements EventSubscriberInterface{

	private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
	public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['hashPasswordUserEncoder', EventPriorities::PRE_WRITE],
        ];
    }

    public function hashPasswordUserEncoder(ViewEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

    	if (!$entity instanceof User || !in_array($method, [Request::METHOD_POST,Request::METHOD_PUT])) {
            return;
        }

        $password = $this->encoder->encodePassword($entity, $entity->getPassword());
        $entity->setPassword($password);
    }

}