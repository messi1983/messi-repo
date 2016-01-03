<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Chant;
use Sdz\BlogBundle\Form\ChantType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class ChantController extends AbsSiteController
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
	public function supprimerAction(Chant $chant)
	{
		return $this->supprimer($chant);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Chant $chant)
	{
		return $this->modifier($chant);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Chant $chant)
	{
		return $this->voir($chant);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('chant.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::CHANT_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::CHANT_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_CHANTS;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_CHANT;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_CHANT;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_CHANT;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_CHANT;
	}
	
	protected function createNewEntity()
	{
		return new Chant;
	}
	
	protected function createNewFormType()
	{
		return new ChantType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACTIVITE;
	}
}
?>