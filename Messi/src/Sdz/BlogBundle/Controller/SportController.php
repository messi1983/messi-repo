<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Entity\Sport;
use Sdz\BlogBundle\Form\SportType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;
use Doctrine\Common\Collections\Criteria;

class SportController extends AbsSiteController
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
	public function supprimerAction(Sport $sport)
	{
		return $this->supprimer($sport);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Sport $sport)
	{
		return $this->modifier($sport);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Sport $sport)
	{
		return $this->voir($sport);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('sport.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::SPORT_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::SPORT_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_SPORTS;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_SPORTS;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_SPORT;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_SPORT;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_SPORT;
	}
	
	protected function createNewEntity()
	{
		return new Sport;
	}
	
	protected function createNewFormType()
	{
		return new SportType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACTIVITE;
	}
	
}
?>