<?php

namespace Sdz\BlogBundle\Entity;

/**
 * VisitorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VisitorRepository  extends CommonSiteRepository
{
	protected function getAllEntities()
	{
		$query = $this->createQueryBuilder('v')
		->orderBy('v.lastConnection', 'DESC');
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
	{
		return $this-> getAllEntities();
	}
}
