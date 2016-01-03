<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DanseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DanseRepository extends CommonSiteRepository
{
	protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('d') 
		              ->orderBy('d.dateDebut', 'DESC');
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('d')
					  ->orderBy('d.dateDebut', 'DESC')
					  ->add('where', 'd.publication = 1');
					  
		return $query->getQuery();
	}
}