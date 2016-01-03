<?php
namespace Sdz\BlogBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sdz\BlogBundle\Entity\Societe;
use Sdz\BlogBundle\Entity\Image;
use Sdz\BlogBundle\Form\SocieteType;
use Sdz\BlogBundle\Form\ImageType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
 
class SocieteController extends AbsSiteController
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
	public function supprimerAction(Societe $societe)
	{
		return $this->supprimer($societe);
	}
	
	/**
	 * Allows to update an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Societe $societe)
	{
		return $this->modifier($societe);
	}
	
	/**
	  * Allows to see a bean detail.
	  */
	public function voirAction(Societe $societe)
	{
		return $this->voir($societe);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.add');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('societe.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::SOCIETE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::SOCIETE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_SOCIETES;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_SOCIETES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_SOCIETE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_SOCIETE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_SOCIETE;
	}
	
	protected function createNewEntity()
	{
		return new Societe;
	}
	
	protected function createNewFormType()
	{
		return new SocieteType;
	}
}
?>