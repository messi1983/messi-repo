<?php

namespace Sdz\BlogBundle\Entity;

/**
 * SiteRepositoryInterface : Common interface.
 */
interface SiteRepositoryInterface
{	
	/**
	 * Get all published entities.
	 * @param int $nombreParPage
	 *		the number of entities by page.
	 * @param int $page
	 *		the current page.
	 * @param boolean $isAdmin
	 *
	 * @return list of ojects
	 */
	function getPublishedEntities($nombreParPage, $page, $isAdmin);
}
