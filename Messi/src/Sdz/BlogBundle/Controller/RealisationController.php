<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
use Sdz\BlogBundle\Entity\Realisation;
use Sdz\BlogBundle\Form\RealisationType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;
 
class RealisationController extends AbsSiteController
{ 
	/**
	 * Allow to list all entities on a page.
	 */
	public function voirListeAction($page)
	{
		return $this->voirListe($page);
	}
	
	/**
	 * Allows to delete an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function supprimerAction(Realisation $realisation)
	{
		return $this->supprimer($realisation);
	}
	
	/**
	 * Allows to update the realisation.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Realisation $realisation)
	{
		return $this->modifier($realisation);
	}
	
	/**
	  * Allows to see a bean detail.
	  * 
	  */
	public function voirAction(Realisation $realisation)
	{
		return $this->voir($realisation);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.liste.published.label');
	}
	
	protected function getUpdateWarningMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.update.warning.realisation');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.delete.confirmation.realisation');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.delete.flash.realisation');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('realisation.update.flash.realisation');
	}
	
	protected function getDetailView()
	{
		return Constants::REALISATION_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::REALISATION_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_REALISATIONS;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_REALISATIONS;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_REALISATION;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_REALISATION;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_REALISATION;
	}
	
	protected function createNewEntity()
	{
		return new Realisation;
	}
	
	protected function createNewFormType()
	{
		return new RealisationType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_REALISATION;
	}
}
?>