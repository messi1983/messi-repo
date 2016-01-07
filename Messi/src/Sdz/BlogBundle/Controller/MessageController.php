<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Message;
use Sdz\BlogBundle\Form\MessageType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sdz\BlogBundle\Constants\Constants;
 
class MessageController extends AbsSiteController
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
	 */
	public function ajouterAction()
	{
		return $this->ajouter();
	}
	
	/**
	 * Allows to delete an author.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function supprimerAction(Message $message)
	{
		return $this->supprimer($message);
	}
	
	/**
	 * Allows to update the message.
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function modifierAction(Message $message)
	{
		return $this->modifier($message);
	}
	
	/**
	  * Allows to see a bean detail.
	  * @Secure(roles="ROLE_ADMIN")
	  */
	public function voirAction(Message $message)
	{
		return $this->voir($message);
	}
	
	protected function getTitle($action)
	{
		if($action == Constants::ACTION_DETAIL) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.detail');
		}
		else if ($action == Constants::ACTION_ADD) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.add.title');
		}
		else if ($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.deletion');
		}
		else if ($action == Constants::ACTION_UPDATE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.modification');
		}
		
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.liste.label');
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.liste.published.label');
	}
	
	protected function getBackUpDetailMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.goback');
	}
	
	protected function getNoResultMessage($action)
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.empty');
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.delete.confirmation.message');
	}
	
	protected function getFlashBagMessage($action)
	{
		if($action == Constants::ACTION_DELETE) {
			return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.delete.flash.message');
		}
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('message.update.flash.message');
	}
	
	protected function getDetailView()
	{
		return Constants::MESSAGE_VIEW;
	}
   
	protected function getClass()
	{
		return Constants::MESSAGE_CLASS;
	}
   
	protected function getListingUrl()
	{
		return Constants::ROUTE_VOIR_MESSAGES;
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return Constants::ACCUEIL_MESSAGES;
	}
   
	protected function getDeletionUrl()
	{
		return Constants::ROUTE_SUPPRIMER_MESSAGE;
	}
   
    protected function getModificationUrl()
	{
		return Constants::ROUTE_MODIFIER_MESSAGE;
	}
	
	protected function getDetailUrl()
	{
		return Constants::ROUTE_VOIR_MESSAGE;
	}
	
	protected function createNewEntity()
	{
		return new Message;
	}
	
	protected function createNewFormType()
	{
		return new MessageType;
	}
	
	protected function getMenuIndexBtnToActivate()
	{
		return Constants::INDEX_BTN_MESSAGE;
	}
}
?>
