<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TacheRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TacheRepository extends CommonSiteRepository
{
	protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('t')
					  ->leftJoin('t.sousTaches', 'st')
						->addSelect('st')
					  ->orderBy('t.order', 'ASC')
					  ->getQuery();
					  
		return $query;
	}
	
	protected function getAllPublishedEntities()
    {
		$query = getAllEntities();
		$query->add('where', 't.publication = 1');
					  
		return $query->getQuery();
	}
}
