<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ExperienceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExperienceRepository extends CommonSiteRepository 
{	
	protected function getAllEntities()
    {
		$query = $this->createQueryBuilder('e')
					  ->leftJoin('e.periode', 'p')
					 	->addSelect('p')
					  ->orderBy('p.dateDebut', 'DESC')
					  ->leftJoin('e.societe', 's')
						->addSelect('s')
					  ->leftJoin('e.technos', 't')
						->addSelect('t');
						
		return $query->getQuery();
	}
	
	protected function getAllPublishedEntities()
    {
		$query = $this->createQueryBuilder('e')
					  ->leftJoin('e.periode', 'p')
						->addSelect('p')
					  ->orderBy('e.dateDebut', 'DESC')
					  ->leftJoin('e.societe', 's')
						->addSelect('s')
					  ->leftJoin('e.technos', 't')
						->addSelect('t')
					  ->add('where', 'e.publication = 1');
					  
		return $query->getQuery();
	}
}