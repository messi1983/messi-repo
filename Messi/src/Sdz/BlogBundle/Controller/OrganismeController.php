<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Organisme;
use Sdz\BlogBundle\Form\OrganismeType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class OrganismeController extends AbsSiteController
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
	public function supprimerAction(Organisme $organisme)
	{
		return $this->supprimer($organisme);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Organisme $organisme)
	{
		return $this->modifier($organisme);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Organisme $organisme)
	{
		return $this->voir($organisme);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('organisme.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::ORGANISME_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::ORGANISME_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_ORGANISMES;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_ORGANISME;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_ORGANISME;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_ORGANISME;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_ORGANISME;
	}
	
	protected function createNewEntity()
	{
		return new Organisme;
	}
	
	protected function createNewFormType()
	{
		return new OrganismeType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACTIVITE;
	}
}
?>