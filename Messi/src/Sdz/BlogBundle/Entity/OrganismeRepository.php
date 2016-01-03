<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OrganismeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrganismeRepository extends CommonSiteRepository
{
	protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('o')
		              ->orderBy('o.dateEntree', 'DESC');		  
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('o')
		              ->orderBy('o.dateEntree', 'DESC')
					  ->add('where', 'o.publication = 1');
					  
		return $query->getQuery();
	}
}
