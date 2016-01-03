<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Theatre;
use Sdz\BlogBundle\Form\TheatreType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class TheatreController extends AbsSiteController
{
	/**
	 * Allow to list all entities on a page.
	 */
	public function voirListeAction($page)
	{
		return $this->voirListe($page);
	}
	
	/**
	 * Adds an entity in a database.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function ajouterAction()
	{
		return $this->ajouter();
	}
	
	/**
	 * Allows to delete an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function supprimerAction(Theatre $theatre)
	{
		return $this->supprimer($theatre);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Theatre $theatre)
	{
		return $this->modifier($theatre);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Theatre $theatre)
	{
		return $this->voir($theatre);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('theatre.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::THEATRE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::THEATRE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_THEATRES;
	}
	
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_THEATRE;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_THEATRE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_THEATRE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_THEATRE;
	}
	
	protected function createNewEntity()
	{
		return new Theatre;
	}
	
	protected function createNewFormType()
	{
		return new TheatreType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACTIVITE;
	}
}
?>