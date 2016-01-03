<?php
namespace Sdz\UserBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 
class Users implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
		
		$admin = new User;
		$admin->setUsername('messi');
		// On cré un salt pour amélioré la sécurité
		$admin->setPassword($encoder->encodePassword('admin', $admin->getSalt()));
		$admin->setEmail('messi_louis@yahoo.fr');
		$admin->setRoles(array('ROLE_ADMIN'));
		$admin->setEnabled(true);
		
		$user = new User;
		$user->setUsername('louis');
		// On cré un salt pour amélioré la sécurité
		$user->setPassword($encoder->encodePassword('michel', $user->getSalt()));
		$user->setEmail('louis_messi@yahoo.fr');
		$user->setRoles(array('ROLE_AUTEUR'));
		$user->setEnabled(true);
		
		$validPassword = $encoder->isPasswordValid($user->getPassword(), 'michel', $user->getSalt());
		
		if($validPassword) {
			$manager->persist($admin);
			$manager->persist($user);
		}
	 
		// On déclenche l'enregistrement
		$manager->flush();
	}
}
?>