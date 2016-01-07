<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Ecole;
use Sdz\BlogBundle\Form\EcoleType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;
 
class EcoleController extends AbsSiteController
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
	public function supprimerAction(Ecole $ecole)
	{
		return $this->supprimer($ecole);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Ecole $ecole)
	{
		return $this->modifier($ecole);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Ecole $ecole)
	{
		return $this->voir($ecole);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.goback');;
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('ecole.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::ECOLE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::ECOLE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_ECOLES;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_ECOLES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_ECOLE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_ECOLE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_ECOLE;
	}
	
	protected function createNewEntity()
	{
		return new Ecole;
	}
	
	protected function createNewFormType()
	{
		return new EcoleType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACCUEIL;
	}
}
?>
