<?php 
namespace App\EventSubscriber;

use App\Entity\Post;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\HttpFoundation\Request;



class AuthorOfPostEntitySubscriber implements EventSubscriberInterface{

	private $token;

    public function __construct(TokenStorageInterface $token)
    {
        $this->token = $token;
    }

	public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['addPostAuthorAndDate', 33],
        ];
    }

    public function addPostAuthorAndDate(ViewEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

    	if (!$entity instanceof Post || Request::METHOD_POST !== $method) {
            return;
        }

        $artist = $this->token->getToken()->getUser();
        
        $entity->setPublished(new \Datetime());
        $entity->setAuthor($artist);
    }

}