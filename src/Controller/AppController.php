<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\UserType;
use App\Entity\User;

use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class AppController
{

	private $twig;
	private $encoder;
	private $em;
	private $route;
	private $form;

	public function __construct(RouterInterface $route, Environment $twig,FormFactoryInterface $form, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder){

		$this->twig = $twig;
		$this->encoder = $encoder;
		$this->em = $em;
		$this->form = $form;
		$this->route = $route;
	}

    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
    	$html = $this->twig->render('app/index.html.twig',[]);
    	return new Response($html);
    }


    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils  $auth)
    {
        $html = $this->twig->render('app/login.html.twig', [
        	'error' => $auth->getLastAuthenticationError(),
        	'username' => $auth->getLastUsername()
        ]);

        return new Response($html);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(){}

	
	/**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request){
		
    	$user = new User();
    	$f = $this->form->create(UserType::class, $user);
    	$f->handleRequest($request);
    	if($f->isSubmitted() && $f->isValid() ){

    		$user->setPassword($this->encoder->encodePassword($user, $user->getPassword()));
    		$user->setRoles(['ROLE_USER']);
    		$this->em->persist($user);
    		$this->em->flush();

    		return new RedirectResponse($this->route->generate('app_login'));
    	}

    	$html = $this->twig->render('app/register.html.twig', [ 
    		'form' => $f->createView()
    	]);
    	return new Response($html);
    }



}
