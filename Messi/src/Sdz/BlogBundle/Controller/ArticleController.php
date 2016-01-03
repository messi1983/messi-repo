<?php
namespace Sdz\BlogBundle\Controller;
 
use Sdz\BlogBundle\Entity\Article;
use Sdz\BlogBundle\Form\ArticleType;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Sdz\BlogBundle\Bigbrother\BigbrotherEvents;
use Sdz\BlogBundle\Bigbrother\MessagePostEvent;
 
class ArticleController extends AbsSiteController
{ 
	public function voirAction(Article $article)
	{
		$listeArticleCompetence = $this->getDoctrine()
                                   ->getManager()
                                   ->getRepository('SdzBlogBundle:ArticleCompetence')
                                   ->findByArticle($article->getId());
 
		return $this->render('SdzBlogBundle:Blog:voirArticle.html.twig', array(
																			   'article' => $article,
																			   'listeArticleCompetence'  => $listeArticleCompetence));
	}
   
	/**
	* @Secure(roles="ROLE_AUTEUR")
	*/ 
	public function ajouterAction()
	{
		$article = new Article;
		$form = $this->createForm($this->createNewFormType(), $article);
	 
		$request = $this->get(Constants::REQUEST);
		if ($request->getMethod() == 'POST') {
			$form->bind($request);
 
			if ($form->isValid()) {
				// On crée l'évènement avec ses 2 arguments
				$event = new MessagePostEvent($article->getContenu(), $article->getUser());
 
				// On déclenche l'évènement
				$this->get('event_dispatcher')->dispatch(BigbrotherEvents::onMessagePost, $event);
 
				// On récupère ce qui a été modifié par le ou les listeners, ici le message
				$article->setContenu($event->getMessage());
		
        $em = $this->getDoctrine()->getManager();
        $em->persist($bean);
        $em->flush();
 
        return $this->redirect($this->generateUrl($redirectUrl, array('id' => $bean->getId())));
      }
    }
	
	return $this->render('SdzBlogBundle:Blog:ajouter.html.twig', 
						 array(
						 		Constants::ATTRIBUTE_FORM_VIEW   => $form->createView(), 
						 		Constants::ATTRIBUTE_TITLE       => $title, 
						 		'message'                        => $message
						 )
			);
  }
  
  public function menuAction($nombre)
  {
	$liste = $this->getDoctrine()
                  ->getManager()
                  ->getRepository('SdzBlogBundle:Article')
                  ->findBy(
                    array(),          // Pas de critère
                    array('date' => 'desc'), // On trie par date décroissante
                    $nombre,         // On sélectionne $nombre articles
                    0                // à partir du premier
                  );
 
    return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
      'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
    ));
  }
	
	public function supprimerAction(Article $article)
	{
		return $this->supprimer($article);
	}
	
	public function modifierAction(Article $article)
	{
		return $this->modifier($article);
	}
	
	protected function getTitle($action)
	{
		if(action == Constants::ACTION_DETAIL) {
			return 'Détail d\'un article';
		}
		else if (action == ACTION_ADD) {
			return 'Ajout d\'un nouvel article';
		}
		else if (action == ACTION_DELETE) {
			return 'Suppression d\'un article';
		}
		else if (action == ACTION_UPDATE) {
			return 'Modification d\'article';
		}
		
		return 'Liste des articles';
	}
	
	protected function getNotPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.liste.not.published.label');
	}
	
	protected function getPublishedListTitle()
	{
		return $this->get(Constants::TRANSLATOR_SERVICE)->trans('formation.liste.published.label');
	}
	
	protected function getAdditionWarningMessage()
	{
		return 'Cet article sera  directement sur la page d\'accueil après validation du formulaire.';
	}
	
	protected function getUpdateWarningMessage()
	{
		return 'Vous éditez une article déjà existant, ne le changez pas trop pour éviter aux membres de ne pas comprendre ce qui se passe.';
	}
	
	protected function getBackUpDetailMessage()
	{
		return 'Retour à l\'article';
	}
	
	protected function getNoResultMessage($action)
	{
		return 'Pas (encore !) d\'articles';
	}
	
	protected function getDeletionConfirmationMessage()
	{
		return "Etes-vous certain de vouloir supprimer l\'article ?";
	}
	
	protected function getFlashBagMessage($action)
	{
		if(action == ACTION_DELETION) {
			return 'Article bien supprimé';
		}
		return 'Article bien modifié';
	}
	protected function getDetailView()
	{
		return 'SdzBlogBundle:Blog:article.html.twig';
	}
   
	protected function getClass()
	{
		return 'SdzBlogBundle:Article';
	}
   
	protected function getListingUrl()
	{
		return 'sdzblog_voir_articles';
	}
	protected function getNbMaxEntitiesByPage()
	{
		return 3;
	}
   
	protected function getAccueilIndex()
	{
		return ACCUEIL_EXPERIENCES;
	}
   
	protected function getDeletionUrl()
	{
		return 'sdzblog_supprimer_article';
	}
   
    protected function getModificationUrl()
	{
		return 'sdzblog_modifier_article';
	}
	
	protected function getDetailUrl()
	{
		return 'sdzblog_voir_article';
	}
	
	protected function createNewEntity()
	{
		return new Article;
	}
	
	protected function createNewFormType()
	{
		return new ArticleType;
	}
}
?>