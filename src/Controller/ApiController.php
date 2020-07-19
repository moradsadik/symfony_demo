<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{


	private $encoder;
    private $em;
    private $serialzer;

	public function __construct( EntityManagerInterface $em, UserPasswordEncoderInterface $encoder, SerializerInterface $serialzer){

        $this->encoder = $encoder;
        $this->serialize = $serialzer;
		$this->em = $em;
	}
	/**
     * @Route("/api/v2/login", name="app_json_login")
     */
    public function json_login(Request $request)
    {
        $json = $request->getContent();
        $user = $this->serialize->deserialize($json, User::class, 'json');
		$email = $user->getEmail();
        
        $repo = $this->em->getRepository(User::class);
        $result = $repo->findOneBy(['email' => $email]);
        if ($user == null) {
            return $this->json("no user found");
        } 
        
        $correct = $this->encoder->isPasswordValid($result,$user->getPassword());

    	return ($correct) ? $this->json($result) : $this->json(null);
    }
}
