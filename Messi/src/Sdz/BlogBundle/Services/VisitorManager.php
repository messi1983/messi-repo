<?php
namespace Sdz\BlogBundle\Services;

use Sdz\BlogBundle\Entity\Visitor;
use Sdz\BlogBundle\Entity\VisitorPage;
use Sdz\BlogBundle\Entity\Page;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Visitor manager class
 */
class VisitorManager //extends \Twig_Extension
{
	/**
	 * Entity manager
	 */
	protected $em;
	
	/**
	 * Security context
	 */
	protected $securityContext;
  
	/**
	 * Constructor
	 */
	public function __construct(EntityManager $em, SecurityContextInterface $securityContext)
	{
		$this->em = $em;
		$this->securityContext = $securityContext;
	}
	
	/**
	 * Save or update a visitor.
	 */
	public function registerVisistor($ipAdress, $pageName) 
	{
		$isAdmin = $this->securityContext->isGranted(Constants::ROLE_ADMIN);
		if($isAdmin) {
			$dateNow = new \Datetime();
			
			$currentPage = $this->getPageByName($pageName);
			$totalVisitsPage = $this->getPageByName(Constants::TOTAL_PAGE_NAME);
			
			// On cherche le visiteur dans la BDD via son adresse
			$visitor = $this->findVisitorByIpAddress($ipAdress);
			
			if($visitor != null) { // Si le visiteur est déjà connu et sa dernière connection date de plus 
								   // de 5 minutes on considère que c'est une nouvelle visite
				$seconds = $dateNow->getTimestamp() - $visitor->getLastConnection()->getTimestamp();
				
				if($seconds > 5 * 60) { // new visit
					$totalVisitsPage->incrementVisits();
					$currentPage->incrementVisits();
				}
				// On met simplement à jour sa date de dernière connection
				$visitor->setLastConnection($dateNow);
			} else { // nouveau visiteur
				$totalVisitsPage->incrementVisits();
				$currentPage->incrementVisits();
				
				// On enregistre le visiteur
				$visitor = $this->createVisitor($ipAdress);
			}
						
			if(!$visitor->hasAlreadyVisitedPage($currentPage)) {
				$visitor->addPage($currentPage);
			}
		}
		// save or update all entities
		$this->em->flush();
		
		return $this;
	}
	
	
	/**
	 * Allows to find page by name.
	 */
	private function findVisitorByIpAddress($ipAddress) {
		$visitorRepository = $this->em->getRepository('SdzBlogBundle:Visitor');
		return $visitorRepository->findOneBy(array('ipAdress' => $ipAddress));
	}
	
	/**
	 * Allows to get a page by name.
	 */
	private function getPageByName($pageName) {
		$page = $this->findPageByName($pageName);
		
		if($page == null) {
			$page = $this->createPage($pageName);
		}
		return $page;
	}
	
	/**
	 * Allows to find a page by name.
	 */
	private function findPageByName($pageName) {
		$pageRepository = $this->em->getRepository('SdzBlogBundle:Page');
		return $pageRepository->findOneBy(array('nom' => $pageName));
	}
	
	/**
	 * Allows to create a page in database.
	 */
	private function createPage($pageName) {
		$page = new Page;
		$page->setNom($pageName);
		
		$this->createObject($page);
		
		return $page;//$this->findPageByName($pageName);
	}
	
	/**
	 * Allows to create a visitor in database.
	 */
	private function createVisitor($ipAddress) {
		$visitor = new Visitor;
		$visitor->setIpAdress($ipAddress);
		
		$visitor = $this->createObject($visitor);
		
		return $visitor;//$this;
	}
	
	/**
	 * Allows to create an object in database.
	 */
	private function createObject($object) {
		$this->em->persist($object);
		
		return $object;
	}
}
?>