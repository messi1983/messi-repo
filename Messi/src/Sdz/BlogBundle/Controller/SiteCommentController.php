<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\SiteComment;
use Sdz\BlogBundle\Form\SiteCommentType;
use Sdz\BlogBundle\Form\SiteCommentAdminType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;

/**
 * SiteCommentController : SiteComment Controller
 *
 * @author Messi
 *
 */
class SiteCommentController extends AbsSiteController
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
	 */
	public function ajouterAction()
	{
		return $this->ajouter();
	}
	
	/**
	 * Allows to delete an comment.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function supprimerAction(SiteComment $siteComment)
	{
		return $this->supprimer($siteComment);
	}
	
	/**
	 * Allows to update the comment.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(SiteComment $siteComment)
	{
		return $this->modifier($siteComment);
	}
	
	/**
	  * Allows to see a comment detail.
	  */
	public function voirAction(SiteComment $siteComment)
	{
		return $this->voir($siteComment);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.add.title');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('comment.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::COMMENT_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::SITE_COMMENT_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_COMMENTS;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_COMMENTS;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_COMMENT;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_COMMENT;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_COMMENT;
	}
	
	protected function createNewEntity()
	{
		return new SiteComment;
	}
	
	protected function createNewFormType()
	{
		$isAdmin = $this->get(Constants::SECURITY_CONTEXT)->isGranted(Constants::ROLE_ADMIN);
		
		if($isAdmin) {
			return new SiteCommentAdminType;
		}
		
		return new SiteCommentType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_COMMENT;
	}
}
?>
