<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Auteur;
use Sdz\BlogBundle\Form\AuteurType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class AuteurController extends AbsSiteController
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
	public function supprimerAction(Auteur $auteur)
	{
		return $this->supprimer($auteur);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Auteur $auteur)
	{
		return $this->modifier($auteur);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Auteur $auteur)
	{
		return $this->voir($auteur);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('author.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::AUTEUR_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::AUTEUR_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_AUTEURS;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_AUTEUR;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_AUTEUR;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_AUTEUR;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_AUTEUR;
	}
	
	protected function createNewEntity()
	{
		return new Auteur;
	}
	
	protected function createNewFormType()
	{
		return new AuteurType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACTIVITE;
	}
}
?>