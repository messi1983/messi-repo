<?php

namespace Sdz\BlogBundle\Entity;

/**
 * RealisationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RealisationRepository extends CommonSiteRepository
{
    protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('r')
		              ->orderBy('r.date', 'DESC');	
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('r')
		              ->orderBy('r.date', 'DESC')
					  ->add('where', 'r.publication = 1');
					  
		return $query->getQuery();
	}
}
