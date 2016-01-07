<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Techno;
use Sdz\BlogBundle\Form\TechnoType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class TechnoController extends AbsSiteController
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
	public function supprimerAction(Techno $techno)
	{
		return $this->supprimer($techno);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Techno $techno)
	{
		return $this->modifier($techno);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Techno $techno)
	{
		return $this->voir($techno);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('techno.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::TECHNO_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::TECHNO_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_TECHNOS;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_COMPETENCES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_TECHNO;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_TECHNO;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_TECHNO;
	}
	
	protected function createNewEntity()
	{
		return new Techno;
	}
	
	protected function createNewFormType()
	{
		return new TechnoType;
	}
}
?>
