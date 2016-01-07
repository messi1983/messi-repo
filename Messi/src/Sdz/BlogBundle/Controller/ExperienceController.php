<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Experience;
use Sdz\BlogBundle\Form\ExperienceType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

class ExperienceController extends AbsSiteController
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
	public function supprimerAction(Experience $experience)
	{
		return $this->supprimer($experience);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Experience $experience)
	{
		return $this->modifier($experience);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Experience $experience)
	{
		return $this->voir($experience);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('experience.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::EXPERIENCE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::EXPERIENCE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_EXPERIENCES;
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
		return Constants::ROUTE_SUPPRIMER_EXPERIENCE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_EXPERIENCE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_EXPERIENCE;
	}
	
	protected function createNewEntity()
	{
		return new Experience;
	}
	
	protected function createNewFormType()
	{
		return new ExperienceType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_ACCUEIL;
	}
	
}
?>
