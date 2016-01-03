<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ChantRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChantRepository extends CommonSiteRepository
{
	protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('c')
					  ->orderBy('c.dateRedaction', 'DESC');
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('c')
					  ->orderBy('c.dateRedaction', 'DESC');
		$query->add('where', 'c.publication = 1');
					  
		return $query->getQuery();
	}
}
