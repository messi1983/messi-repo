<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Form\CategorieType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;


class CategorieController extends AbsSiteController
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
	 * Allows to delete an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function supprimerAction(Categorie $categorie)
	{
		return $this->supprimer($categorie);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Categorie $categorie)
	{
		return $this->modifier($categorie);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Categorie $categorie)
	{
		return $this->voir($categorie);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('category.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::CATEGORIE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::CATEGORIE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return 'sdzblog_voir_categories';
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_CATEGORIES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_CATEGORIE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_CATEGORIE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_CATEGORIE;
	}
	
	protected function createNewEntity()
	{
		return new Categorie;
	}
	
	protected function createNewFormType()
	{
		return new CategorieType;
	}
}
?>