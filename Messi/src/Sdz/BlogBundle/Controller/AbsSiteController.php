<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Entity\SiteComment;
use Sdz\BlogBundle\Entity\Message;
use Sdz\BlogBundle\Constants\Constants;
 
abstract class AbsSiteController extends Controller
{  
	/** is a new entity. */
	protected $isNewEntity = false;
	
	/** message to print attribute name. */
	const ATTRIBUTE_MESSAGE = 'message';
	
	/** deletion url attribute name. */
	const ATTRIBUTE_SUPPRESSION_URL = 'suppressionUrl';
	
	/** update URL attribute name. */
	const ATTRIBUTE_UPDATE_URL = 'modificationUrl';
	
	/** entity attribute name. */
	const ATTRIBUTE_ENTITY = 'bean';
	
	/** detail attribute name. */
	const ATTRIBUTE_DETAIL = 'detail';
	
	/** new entity attribute name. */
	const ATTRIBUTE_NEW_ENTITE = 'isNewEntity';
	
	/** empty message attribute name. */
	const ATTIBUTE_EMPTY_MESSAGE = 'emptyMessage';
	
	/** Nb pages attribute name. */
	const ATTRIBUTE_NB_PAGES = 'nombrePage';
	
	/** list of non published entities Title attribute name. */
	const ATTRIBUTE_NOT_PUBLISHED_ENTITIES_TITLE = 'notPublishedListTitle';
	
	/** list of non published entities attribute name. */
	const ATTRIBUTE_NOT_PUBLISHED_ENTITIES_LIST = 'nonPublishedEntities';
	
	/** List published entities Title attribute name. */
	const ATTRIBUTE_PUBLISHED_ENTITIES_TITLE = 'publishedListTitle';
	
	/** list of published entities attribute name. */
	const ATTRIBUTE_PUBLISHED_ENTITIES_LIST = 'publishedEntities';
	
	/** id attribute name. */
	const ATTRIBUTE_ID = 'id';
	
	/** form input action. */
	const FORM_INPUT_ACTION = 'action';
	
	/** form input myIds. */
	const FORM_INPUT_MYIDS = 'myIds';
	
	/** Flash Bag info. */
	const FLASH_BAG_INFO = 'info';
	
	/**
	 * Allow to list all entities on a page.
	 */
	protected function voirListe($page) {
		// is not a new entity.
		$this->isNewEntity = false;
		$request = $this->get(Constants::REQUEST);
		$isAdmin = $this->get(Constants::SECURITY_CONTEXT)->isGranted(Constants::ROLE_ADMIN);
		$locale = $request->attributes->get(Constants::ATTRIBUTE_LOCALE);
		
		if(!$isAdmin) {
			// registerVisitor
			$this->container->get(Constants::VISITOR_MANAGER)
							->registerVisistor($request->getClientIp(), $this->getTitle(Constants::ACTION_LISTING));
		}
		
		// from form
		if ($request->getMethod() == Constants::METHOD_POST) {
			$ids = $request->get($this::FORM_INPUT_MYIDS);
			$action = $request->get($this::FORM_INPUT_ACTION);
			
			$this->executeAction($action, $ids);
		}
		
		// DateTime Last modification
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
			
		$array = array(
				    Constants::PARAMETER_LAST_UPDATE         => $dateTimeLastModification,
					Constants::ATTRIBUTE_TITLE               => $this->getTitle(Constants::ACTION_LISTING),
					Constants::ATTRIBUTE_PAGE                => $page,
					Constants::ATTRIBUTE_LISTING             => true,
					Constants::ATTRIBUTE_LISTING_URL         => $this->getListingUrl(),
					Constants::ATTRIBUTE_INDEX_HOME          => $this->getAccueilIndex(),
				    Constants::ATTRIBUTE_NB_ENTITY_BY_PAGE   => $this->getNbMaxEntitiesByPage(),
					Constants::ATTIBUTE_BUTTON_TO_ACTIVATE   => $this->getMenuIndexBtnToActivate(),
					$this::ATTIBUTE_EMPTY_MESSAGE            => $this->getNoResultMessage(Constants::ACTION_LISTING),
					Constants::ATTRIBUTE_TARGET_VIEW         => $this->getDetailView()
				);
		
		if($isAdmin) {
			$beans = $this->container->get(Constants::BLOG_SERVICE)
									 ->getEntities($this->getNbMaxEntitiesByPage(), $page, $isAdmin, $this->getClass());
			$publishedEntities = array();
			$nonPublishedEntities = array();
			
			foreach($beans as $bean) {
				// Set the locale
				$this->setEntityLocale($bean, $locale);
				
				if($bean->getPublication()) {
					array_push($publishedEntities, $bean);
				} else {
					array_push($nonPublishedEntities, $bean);
				}
			}
			$array[$this::ATTRIBUTE_NB_PAGES] = ceil(count($beans)/$this->getNbMaxEntitiesByPage());
			$array[$this::ATTRIBUTE_NOT_PUBLISHED_ENTITIES_TITLE] = $this->getNotPublishedListTitle();
			$array[$this::ATTRIBUTE_PUBLISHED_ENTITIES_TITLE]  = $this->getPublishedListTitle();
			$array[$this::ATTRIBUTE_PUBLISHED_ENTITIES_LIST] = $publishedEntities;
			$array[$this::ATTRIBUTE_NOT_PUBLISHED_ENTITIES_LIST] = $nonPublishedEntities;
			
		} else {
			$publishedEntities = $this->container->get(Constants::BLOG_SERVICE)
									  ->getPublishedEntities($this->getNbMaxEntitiesByPage(), $page, $isAdmin, $this->getClass());
			
			// Set list Locale
			$this->setListLocale($publishedEntities, $locale);
			
			$array[$this::ATTRIBUTE_NB_PAGES] = ceil(count($publishedEntities)/$this->getNbMaxEntitiesByPage());
			$array[$this::ATTRIBUTE_PUBLISHED_ENTITIES_LIST] = $publishedEntities;
		}
		
		return $this->render(Constants::LISTING_VIEW, $array);
	}
	
	/**
	 * Adds an entity in a database.
	 */
	protected function ajouter() {	
		$bean = $this->createNewEntity();
		$form = $this->createForm($this->createNewFormType(), $bean);
		$request = $this->get(Constants::REQUEST);
		$this->isNewEntity = false;
		
		if ($request->getMethod() == Constants::METHOD_POST) {
			$form->bind($request);
			$this->isNewEntity = true;
			
			if ($form->isValid()) {
				if($bean instanceof Message || $bean instanceof SiteComment) {
					// registerVisitor @IP
					$bean->getAuteur()->setIpAdress($this->get(Constants::REQUEST)->getClientIp());
				} else {
					//  Update the last update dateTime.
					$this->updateLastUpdateDateTime($bean);
				}
				
				// Save entity
				$this->container->get(Constants::BLOG_SERVICE)->saveOrUpdate($bean);
				
				// If is admin
				if($this->get(Constants::SECURITY_CONTEXT)->isGranted(Constants::ROLE_ADMIN)) {
					return $this->redirect($this->generateUrl($this->getDetailUrl(), array($this::ATTRIBUTE_ID => $bean->getId())));
				}
				else {
					if ($bean instanceof SiteComment) {
						return $this->redirect($this->generateUrl($this->getListingUrl()));
					}
					return $this->redirect($this->generateUrl(Constants::ROUTE_HOME));
				}
			}
		}
		
		// DateTime Last modification
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
	
		return $this->render(
			Constants::ADD_VIEW, 
			array(
				Constants::PARAMETER_LAST_UPDATE          => $dateTimeLastModification,
				$this::ATTRIBUTE_ENTITY                   => $bean,
				Constants::ATTRIBUTE_REDIRECT_URL         => Constants::ROUTE_HOME,
				Constants::ATTRIBUTE_FORM_VIEW            => $form->createView(), 
				Constants::ATTRIBUTE_TITLE                => $this->getTitle(Constants::ACTION_ADD), 
				Constants::ATTIBUTE_BUTTON_TO_ACTIVATE    => $this->getMenuIndexBtnToActivate(),
				Constants::ATTRIBUTE_INDEX_HOME           => $this->getAccueilIndex()
			)
		);
	}
	
	
    /**
     * Allows to see a bean detail.
     */
	protected function voir($bean) {
		if($bean->getReferencePageName() !== null) {
			// registerVisitor
			$this->container->get(Constants::VISITOR_MANAGER)
							->registerVisistor($this->get(Constants::REQUEST)->getClientIp(), $bean->getReferencePageName());
		}
		
		$request = $this->get(Constants::REQUEST);
		$locale = $request->attributes->get(Constants::ATTRIBUTE_LOCALE);
		
		// Set the locale
		$this->setEntityLocale($bean, $locale);
		
		// DateTime Last modification
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
		
		return $this->render(
				Constants::SEE_VIEW, 
				array (
					Constants::PARAMETER_LAST_UPDATE        => $dateTimeLastModification,
					$this::ATTRIBUTE_ENTITY                 => $bean, 
					Constants::ATTRIBUTE_LISTING_URL        => $this->getListingUrl(), 
					Constants::ATTRIBUTE_TITLE 			    => $this->getTitle(Constants::ACTION_DETAIL),
					$this::ATTRIBUTE_SUPPRESSION_URL 	    => $this->getDeletionUrl(), 
					$this::ATTRIBUTE_UPDATE_URL 		    => $this->getModificationUrl(), 
					Constants::ATTRIBUTE_DETAIL_VIEW 		=> $this->getDetailView(), 
					Constants::ATTRIBUTE_INDEX_HOME    	    => $this->getAccueilIndex(),
					Constants::ATTIBUTE_BUTTON_TO_ACTIVATE 	=> $this->getMenuIndexBtnToActivate(),
					$this::ATTRIBUTE_DETAIL  				=> true, 
					Constants::ATTRIBUTE_LISTING 			=> false, 
					$this::ATTRIBUTE_NEW_ENTITE 	        => $this->isNewEntity
				)
		);
	}
	
	/**
	  * Allows to update an entity.
	  */
	protected function modifier($bean) {
		$this->isNewEntity = false;
		$request = $this->get(Constants::REQUEST);
		$locale = $request->attributes->get(Constants::ATTRIBUTE_LOCALE);
		
		// Set the locale
		$this->setEntityLocale($bean, $locale);
		
		// Create form from bean
		$form = $this->createForm($this->createNewFormType(), $bean);
	
		if ($request->getMethod() ==  Constants::METHOD_POST) {
			//  Update the last update dateTime.
			$this->updateLastUpdateDateTime($bean);
			$form->bind($request);
 
			if ($form->isValid()) {
				// sauvegarde de l'entit�
				$this->container->get(Constants::BLOG_SERVICE)->saveOrUpdate($bean);
		
				// On d�finit un message flash
				$this->get(Constants::SESSION)->getFlashBag()->add($this::FLASH_BAG_INFO, $this->getFlashBagMessage(Constants::ACTION_UPDATE));
 
				return $this->redirect($this->generateUrl($this->getDetailUrl(), array($this::ATTRIBUTE_ID => $bean->getId())));
			}
		}
		
		// DateTime Last modification
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
	
		return $this->render(
				Constants::UPDATE_VIEW, 
				array(
					Constants::PARAMETER_LAST_UPDATE        => $dateTimeLastModification,
					Constants::ATTRIBUTE_FORM_VIEW 		    => $form->createView(), 
					Constants::ATTRIBUTE_REDIRECT_URL       => $this->getDetailUrl(), 
					$this::ATTRIBUTE_ENTITY                 => $bean, 
					Constants::ATTRIBUTE_TITLE              => $this->getTitle(Constants::ACTION_UPDATE), 
					Constants::ATTIBUTE_BUTTON_TO_ACTIVATE  => $this->getMenuIndexBtnToActivate(),
					Constants::ATTRIBUTE_INDEX_HOME         => $this->getAccueilIndex()
				)
		);
	}
	
	/**
	 * Allows to delete an entity.
	 */
	protected function supprimer($bean) {
		$this->isNewEntity = false;
		
		// On cr�e un formulaire vide, qui ne contiendra que le champ CSRF
		// Cela permet de prot�ger la suppression d'article contre cette faille
		$form = $this->createFormBuilder()->getForm();
 
		if ($this->get(Constants::REQUEST)->getMethod() ==  Constants::METHOD_POST) {
			//  Update the last update dateTime.
			$this->updateLastUpdateDateTime($bean);
			
			// Delete entity on database
			$this->container->get(Constants::BLOG_SERVICE)->supress($bean);
       
			$this->get(Constants::SESSION)->getFlashBag()->add($this::FLASH_BAG_INFO, $this->getFlashBagMessage(Constants::ACTION_DELETE));
 
			// Puis on redirige vers le listing
			return $this->redirect($this->generateUrl($this->getListingUrl()));
		}
		
		// DateTime Last modification
		$dateTimeLastModification = $this->container->get(Constants::ACTUALISATION_MANAGER)->getLastUpdateDateTime();
 
		// Si la requ�te est en GET, on affiche une page de confirmation avant de supprimer
		return $this->render(
				Constants::DELETION_VIEW, 
				array(
					Constants::PARAMETER_LAST_UPDATE        => $dateTimeLastModification,
					$this::ATTRIBUTE_ENTITY 		        => $bean,
					Constants::ATTRIBUTE_TITLE 			    => $this->getTitle(Constants::ACTION_DELETE), 
					$this::ATTRIBUTE_MESSAGE 			    => $this->getDeletionConfirmationMessage(),
					$this::ATTRIBUTE_SUPPRESSION_URL 	    => $this->getDeletionUrl(),
					Constants::ATTRIBUTE_DETAIL_URL 		=> $this->getDetailUrl(),
					Constants::ATTIBUTE_BUTTON_TO_ACTIVATE 	=> $this->getMenuIndexBtnToActivate(),
					Constants::ATTRIBUTE_FORM_VIEW    		=> $form->createView()
				)
		);
	}
	
	/**
	 * Update the last update dateTime.
	 */
	protected function updateLastUpdateDateTime($bean) {
		if(!($bean instanceof Message || $bean instanceof SiteComment)) {
			// Manager of last update date
			$lastUpdateManager = $this->container->get(Constants::ACTUALISATION_MANAGER);
			$lastUpdateManager->updateLastUpdateDateTime();
		}
		
		return $this;
	}
	
	/**
	 * Get number of entity to print by page.
	 */
	protected function getNbMaxEntitiesByPage() {
		return 3;
	}
	
	/**
	 * Get page title according to the action.
	 */
	protected abstract function getTitle($action);
	
	/**
	 * Get not published elements list title.
	 */
	protected abstract function getNotPublishedListTitle();
	
	/**
	 * Get published elements list title.
	 */
	protected abstract function getPublishedListTitle();
	
	/**
	 * Get the message to print when no result according to the action.
	 */
	protected abstract function getNoResultMessage($action);
	
	/**
	 * Get the message to print to confirm deletion.
	 */
	protected abstract function getDeletionConfirmationMessage();
	
	/**
	 * Get the Flash Bag Message according to the action.
	 */
	protected abstract function getFlashBagMessage($action);
	
	/**
	 * Get the detail view.
	 */
	protected abstract function getDetailView();
	
	/**
	 * Get the route to see the detail.
	 */
	protected abstract function getDetailUrl();
	
	/**
	 * Get the route for update.
	 */
	protected abstract function getModificationUrl();
	
	/**
	 * Get the entity class manage by the controller.
	 */
	protected abstract function getClass();
	
	/**
	 * Get the route to print several entities on the same page.
	 */
	protected abstract function getListingUrl();
	
	/**
	 * Get the index of page listing entities manage by the controller.
	 */
	protected abstract function getAccueilIndex();
	
	/**
	 * Get the message to go back on detail view.
	 */
	protected abstract function getBackUpDetailMessage();
	
	/**
	 * Get the route for deletion.
	 */
	protected abstract function getDeletionUrl();
	
	/**
	 * Creates a new Entity.
	 */
	protected abstract function createNewEntity();
	
	/**
	 * Creates a new Form Type.
	 */
	protected abstract function createNewFormType();
	
	/**
	 * Get the menu index button to activate.
	 */
	protected function getMenuIndexBtnToActivate() {
		return Constants::INDEX_BTN_ACCUEIL;
	}
	
	/**
	 * Set locale to enties of a list.
	 * @param unknown $beans
	 */
	private function setListLocale($beans, $locale) {
		// Set Locale
		foreach($beans as $bean) {
			$this->setEntityLocale($bean, $locale);
		}
	}
	
	/**
	 * Set locale to enties of a list.
	 * @param unknown $bean
	 * @param unknown $locale
	 */
	private function setEntityLocale($bean, $locale) {
		// Set Locale
		if (!($bean instanceof Message || $bean instanceof SiteComment)) {
			$bean->setLocale($locale);
		}
	}
	
	/**
	 * Execute an action.
	 */
	private function executeAction($action, $ids) {
		if ($action == Constants::ACTION_SUPPRESS) {
			$this->container->get(Constants::BLOG_SERVICE)->delete($ids, $this->getClass());
		} else if ($action == Constants::ACTION_PUBLISH) {
			$this->container->get(Constants::BLOG_SERVICE)->publish($ids, $this->getClass());
		} else {
			$this->container->get(Constants::BLOG_SERVICE)->unpublish($ids, $this->getClass());
		}
			
		return $this;
	}
}
?>