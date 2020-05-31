<?php 
namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface ;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class UpdatePasswordAction {

	private $validator;
	private $encoder;
	private $em;
	private $token;

	public function __construct(ValidatorInterface $validator, 
		                        UserPasswordEncoderInterface $encoder, 
		                        EntityManagerInterface $em,
		                        JWTTokenManagerInterface $token){

		$this->validator = $validator;
		$this->encoder = $encoder;
		$this->em = $em;
		$this->token = $token;
	}

	public function __invoke(User $user){
		

		$validation = $this->validator->validate($user);

		dd($validation);

		/*$user->setPassword($this->encoder->encodePassword($user, $user->getNewPassword()));

		$this->em->flush();

		$jeton = $this->token->create($user);

		return new JsonResponse(['token' => $jeton]);*/
		
	}

}
