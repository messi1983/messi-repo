<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Formation;
use Sdz\BlogBundle\Form\FormationType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class FormationController extends AbsSiteController
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
	public function supprimerAction(Formation $formation)
	{
		return $this->supprimer($formation);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Formation $formation)
	{
		return $this->modifier($formation);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Formation $formation)
	{
		return $this->voir($formation);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::FORMATION_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::FORMATION_CLASS;
	}
   
	protected function getListingUrl()
	{
		return 'sdzblog_voir_formations';
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_FORMATIONS;
	}
   
	protected function getDeletionUrl()
	{
		return 'sdzblog_supprimer_formation';
	}
   
    protected function getModificationUrl()
	{
		return 'sdzblog_modifier_formation';
	}
	
	protected function getDetailUrl()
	{
		return 'sdzblog_voir_formation';
	}
	
	protected function createNewEntity()
	{
		return new Formation;
	}
	
	protected function createNewFormType()
	{
		return new FormationType;
	}
}
?>