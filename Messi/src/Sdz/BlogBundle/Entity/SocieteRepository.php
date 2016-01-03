<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SocieteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SocieteRepository extends CommonSiteRepository
{
    protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('s')
					  ->orderBy('s.id', 'ASC')
					  ->leftJoin('s.logo', 'l')
						->addSelect('l');
	 
		return $query->getQuery();
    }
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('s')
					  ->leftJoin('s.logo', 'l')
						->addSelect('l')
					  ->add('where', 's.publication = 1');
					  
		return $query->getQuery();
	}
}