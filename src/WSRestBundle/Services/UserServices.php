<?php
namespace WSRestBundle\Services;

use Doctrine\ORM\EntityManager;
use WSRestBundle\Entity\User;

class UserServices
{
	private $em;

	public function __construct($em)
	{
		$this->em = $em;
	}

	public function getUserById($id)
	{
		$repository = $this->em->getRepository(User::class);
		$user = $repository->findOneById($id);
		return $user;
	}

	public function createUser($user)
	{
		$this->em->persist($user);
		$this->em->flush();
	}
}
?>