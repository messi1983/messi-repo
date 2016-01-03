<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Constants\Constants;
 
class BlogController extends Controller
{ 
	/** column publication. */
	const COL_PUBLICATION = 'publication';
	
	/** header referer. */
	const HEADER_REFERER = 'referer';
	
	/**
	 * Index
	 */
	public function indexAction()
	{
		// Manager of last update date
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
		
		
		// refisterVisitor
		$this->container->get(Constants::VISITOR_MANAGER)
						->registerVisistor($this->get(Constants::REQUEST)->getClientIp(), Constants::ATTRIBUTE_INDEX_HOME);
		
		return $this->render(Constants::HOME_VIEW, 
							 array(
							 		Constants::PARAMETER_LAST_UPDATE   => $dateTimeLastModification,
		  							Constants::ATTRIBUTE_TITLE         => $this->get(Constants::TRANSLATOR_SERVICE)->trans('question.who.i.am'),
		  							Constants::ATTRIBUTE_INDEX_HOME    => Constants::ACCUEIL_PRESENTATION
							 )
				);
	}
	
	/**
	 * set Locale.
	 */
	public function localeAction()
	{
		$request = $this->get(Constants::REQUEST);
		$currentLocale = $request->getLocale();
		$newLocale = $request->query->get(Constants::PARAMETER_LOCALE);
		
		// Default locale
		if($newLocale === null) {
			$newLocale = Constants::LOCALE_FR;
		}
		$referer = str_replace($currentLocale, $newLocale, $this->getRequest()->headers->get($this::HEADER_REFERER));
		
		$this->getRequest()->setLocale($newLocale);
		$this->get(Constants::TRANSLATOR_SERVICE)->setLocale($newLocale);
		
		return $this->redirect($referer);
	}
	
	/**
	 * Voir CV.
	 */
	public function voirCvAction()
	{
		$manager = $this->getDoctrine()->getManager();
		$request = $this->get(Constants::REQUEST);
		$locale = $request->attributes->get(Constants::ATTRIBUTE_LOCALE);
		
		$experiences = $manager
						 ->getRepository(Constants::EXPERIENCE_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => '1' ));
						 
		$technos = $manager
						 ->getRepository(Constants::TECHNO_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
						 
		$formations = $manager
						 ->getRepository(Constants::FORMATION_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
						 
		$categories = $manager
						 ->getRepository(Constants::CATEGORIE_CLASS)
						 ->findAll();
						 
		$sports = $manager
						 ->getRepository(Constants::SPORT_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
						 
		$theatres = $manager
						 ->getRepository(Constants::THEATRE_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
						 
		$danses = $manager
						 ->getRepository(Constants::DANSE_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
						 
		$chants = $manager
						 ->getRepository(Constants::CHANT_CLASS)
						 ->findBy(array($this::COL_PUBLICATION => true ));
		
		$this->setLocaleForEntities($locale, $experiences);
		$this->setLocaleForEntities($locale, $technos);
		$this->setLocaleForEntities($locale, $formations);
		$this->setLocaleForEntities($locale, $categories);
		$this->setLocaleForEntities($locale, $sports);
		$this->setLocaleForEntities($locale, $theatres);	
		$this->setLocaleForEntities($locale, $danses);
		$this->setLocaleForEntities($locale, $chants);
		
		return $this->render(Constants::CV_VIEW, array(
			'isCv'         							  => 'true',
			'technos'      							  => $technos,
			'formations'   							  => $formations,
			'categories'   							  => $categories,
			'experiences'  							  => $experiences,
			'sports'       							  => $sports,
			'theatres'     							  => $theatres,
			'danses'       							  => $danses,
			'chants'       							  => $chants,
			Constants::ATTIBUTE_BUTTON_TO_ACTIVATE    => 2
		));
	}
	
	/**
	 * Set locale.
	 * @param unknown $locale
	 * @param unknown $entities
	 */
	private function setLocaleForEntities($locale, $entities) {
		foreach($entities as $entity) {
			$entity->setLocale($locale);
		}
	}
}
?>