<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Entity\Tache;
use Sdz\BlogBundle\Form\TacheDetailType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class TacheController extends AbsSiteController
{ 
	/**
	 * Allow to list all entities on a page.
	 * @Secure(roles="ROLE_ADMIN")
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
	public function supprimerAction(Tache $tache)
	{
		return $this->supprimer($tache);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Tache $tache)
	{
		return $this->modifier($tache);
	}
	
	/**
	  * Allows to see a bean detail.
	  * @Secure(roles="ROLE_ADMIN")
	  */
	public function voirAction(Tache $tache)
	{
		return $this->voir($tache);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.update');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('task.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::TACHE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::TACHE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_EXPERIENCE;
	}
	
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_EXPERIENCES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_TACHE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_TACHE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_TACHE;
	}
	
	protected function createNewEntity()
	{
		return new Tache;
	}
	
	protected function createNewFormType()
	{
		return new TacheDetailType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACCUEIL;
	}
	
}
?>