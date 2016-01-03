<?php
namespace Sdz\BlogBundle\Services;
use Doctrine\ORM\EntityManager;
use Sdz\BlogBundle\Entity\Theatre;
use Sdz\BlogBundle\Entity\Tache;
use Sdz\BlogBundle\Entity\Experience;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Entity\Sport;

/**
 * Blog service class
 */
class BlogService //extends \Twig_Extension
{
	/**
	 * Entity manager
	 */
	protected $em;
	
	/**
	 * Constructor
	 */
	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}
	
	/**
	 * Allows to delete  entities from their ids.
	 */
	public function delete($ids, $class) {
		$queryBuilder = $this->em->createQueryBuilder()
								 ->delete($class, 'a')
								 ->where('a.id IN (:ids)')
								 ->setParameter('ids', $ids);
		
		$queryBuilder->getQuery()->execute();
			
		return $this;
	}
	
	/**
	 * Allows to publish  entities from their ids.
	 */
	public function publish($ids, $class) {
		return $this->publishUnpublish($ids, true, $class);
	}
	
	/**
	 * Allows to unpublish  entities from their ids.
	 */
	public function unpublish($ids, $class) {
		return $this->publishUnpublish($ids, false, $class);
	}
	
	/**
	 * Find enties from criteria.
	 * @param unknown $nbMaxEntitiesByPage
	 * @param unknown $page
	 * @param unknown $isAdmin
	 */
	public function getEntities($nbMaxEntitiesByPage, $page, $isAdmin, $class) {
		$repository = $this->em->getRepository($class);
		
		return $repository->getEntities($nbMaxEntitiesByPage, $page, $isAdmin);
	}
	
	/**
	 * Find published enties from criteria.
	 * @param unknown $nbMaxEntitiesByPage
	 * @param unknown $page
	 * @param unknown $isAdmin
	 */
	public function getPublishedEntities($nbMaxEntitiesByPage, $page, $isAdmin, $class) {
		$repository = $this->em->getRepository($class);
	
		return $repository->getPublishedEntities($nbMaxEntitiesByPage, $page, $isAdmin);
	}
	
	/**
	 * Allows to publish or unpublish entities from their ids.
	 */
	private function publishUnpublish($ids, $isPublication, $class) {
		$queryBuilder = $this->em->createQueryBuilder()
		->update($class, 'a')
		->set('a.publication', ':identifier')
		->where('a.id IN (:ids)')
		->setParameter('identifier', $isPublication)
		->setParameter('ids', $ids);
	
		$queryBuilder->getQuery()->execute();
			
		return $this;
	}
	
	/**
	 * Allow to persists a bean
	 */
	public function saveOrUpdate($bean)
	{
		// Update task under tasks list
		if($bean instanceof Categorie) {
			foreach($bean->getTechnos() as $techno)
			{
				$techno->setCategorie($bean);
			}
		}
		
		// Update theatre/sport images list
		if($bean instanceof Theatre || $bean instanceof Sport) {
			foreach($bean->getImages() as $image)
			{
				if($image->getState() == 'NOTUSED') {
					if($image->getId() !== null) {
						$this->em->remove($image);
					} else {
						$bean->removeImage($image);
					}
				}
			}
		}
		
		// Update task under tasks list
		if($bean instanceof Tache) {
			foreach($bean->getSousTaches() as $soustache)
			{
				$soustache->setTache($bean);
			}
		}
		
		// Update experience tasks and technos list
		if($bean instanceof Experience) {
			foreach($bean->getTaches() as $tache)
			{
				$tache->setExperience($bean);
			}
			foreach($bean->getTechnos() as $techno){
				$techno->addExperience($bean);
			}
		}
		
		// Save or update
		if($bean->getId() === null) {
			$this->em->persist($bean);
		}
		$this->em->flush();
	
		return $this;
	}
	
	/**
	 * Allows to delete  entity.
	 */
	public function remove($bean) {
		$this->em->remove($bean);
		$this->em->flush();
			
		return $this;
	}
	
}
?>