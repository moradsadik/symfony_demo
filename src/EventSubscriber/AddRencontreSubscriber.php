<?php 
namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Rencontre;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AddRencontreSubscriber implements EventSubscriberInterface{

    private $token;

    public function __construct(TokenStorageInterface $token)
    {
        $this->token = $token;
    }
    
	public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['addRencontre', EventPriorities::PRE_WRITE],
        ];
    }

    public function addRencontre(ViewEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

    	if (!$entity instanceof Rencontre || !in_array($method, [Request::METHOD_POST])) {
            return;
        }

        $user = $this->token->getToken()->getUser();
        $entity->setDate(new \Datetime());
        $entity->setUser($user);
        $entity->setLatLng("");
        
    }

}