<?php

namespace Sdz\BlogBundle\Entity;

/**
 * CategorieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieRepository extends CommonSiteRepository
{
    protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('c');
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('c')
					  ->add('where', 'c.publication = 1');
					  
		return $query->getQuery();
	}
}
