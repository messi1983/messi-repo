<?php

namespace Sdz\BlogBundle\Entity;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends CommonSiteRepository
{
    protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('m')
		              ->orderBy('m.date', 'DESC');	
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('m')
		              ->orderBy('m.date', 'DESC')
					  ->add('where', 'm.publication = 1');
					  
		return $query->getQuery();
	}
}
