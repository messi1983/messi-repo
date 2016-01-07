<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;
 
class PageController extends Controller
{ 
	/** column publication. */
	const COL_PUBLICATION = 'publication';
	
	/** header referer. */
	
	const HEADER_REFERER = 'referer';
	
	/**
	 * Index
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function voirStatsAction()
	{
		$pageRepository = $this->getDoctrine()->getManager()->getRepository(Constants::PAGE_CLASS);
		
		// Manager of last update date
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
		
		
		// refisterVisitor
		$this->container->get(Constants::VISITOR_MANAGER)
						->registerVisistor($this->get(Constants::REQUEST)->getClientIp(), Constants::ATTRIBUTE_INDEX_HOME);
		
		return $this->render(Constants::PAGE_VIEW, 
				array(
					 	Constants::ATTRIBUTE_PAGE                => $pageRepository->getAllPage(),
					 	Constants::PARAMETER_LAST_UPDATE         => $dateTimeLastModification,
  						Constants::ATTRIBUTE_TITLE               => $this->get(Constants::TRANSLATOR_SERVICE)->trans('question.who.i.am'),
  						Constants::ATTRIBUTE_INDEX_HOME          => Constants::ACCUEIL_PAGES,
					 	Constants::ATTIBUTE_BUTTON_TO_ACTIVATE   => Constants::INDEX_BTN_STATS,
				)
		);
	}
}
?>
