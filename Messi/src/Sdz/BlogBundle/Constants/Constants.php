<?php
namespace Sdz\BlogBundle\Constants;
 

/** 
 * Contient les constantes de l'applications
 * @author Messi
 */
class Constants
{ 
	/** total page name. */
	const TOTAL_PAGE_NAME = 'total';
	
	/** Index action "voir detail". */
  	const ACTION_DETAIL = 0;
  
  	/** Index action "ajout nouvelle entit�". */
	const ACTION_ADD = 1;
	
	/** Index action "voir liste d'entit�s". */
	const ACTION_LISTING = 2;
	
	/** Index action "suppression d'une entit�". */
	const ACTION_DELETE = 3;
	
	/** Index action "mise � jour d'une entit�". */
	const ACTION_UPDATE = 4;
  
	/** Index lien "pr�sentation". */
	const ACCUEIL_PRESENTATION = 0;
	
	/** Index lien "ecoles". */
	const ACCUEIL_ECOLES = 1;
	
	/** Index lien "formations". */
	const ACCUEIL_FORMATIONS = 2;
	
	/** Index lien "experiences". */
	const ACCUEIL_EXPERIENCES = 3;
	
	/** Index lien "competences". */
	const ACCUEIL_COMPETENCES = 4;
	
	/** Index lien "competences". */
	const ACCUEIL_SOCIETES = 5;
	
	/** Index lien "categories". */
	const ACCUEIL_CATEGORIES = 6;
	
	/** Index lien "sports". */
	const ACCUEIL_SPORTS = 7;
	
	/** Index lien "theatres". */
	const ACCUEIL_THEATRE = 8;
	
	/** Index lien "danses". */
	const ACCUEIL_DANSE = 9;
	
	/** Index lien "chants". */
	const ACCUEIL_CHANT = 10;
	
	/** Index lien "organismes". */
	const ACCUEIL_ORGANISME = 11;
	
	/** Index lien "auteurs". */
	const ACCUEIL_AUTEUR = 12;
	
	/** Index lien "messages". */
	const ACCUEIL_MESSAGES = 13;
	
	/** Index lien "commentaires". */
	const ACCUEIL_COMMENTS = 14;
	
	/** Index lien "realisations". */
	const ACCUEIL_REALISATIONS = 15;
	
	/** Index lien "visitors". */
	const ACCUEIL_VISITORS = 16;
	
	/** Index lien "pages". */
	const ACCUEIL_PAGES = 17;
	
	/** Index bouton "presentation". */
	const INDEX_BTN_ACCUEIL = 0;
	
	/** Index bouton "activites". */
	const INDEX_BTN_ACTIVITE = 1;
	
	/** Index bouton "cv". */
	const INDEX_BTN_CV = 2;
	
	/** Index bouton "realisations". */
	const INDEX_BTN_REALISATION = 3;
	
	/** Index bouton "messages". */
	const INDEX_BTN_MESSAGE = 4;
	
	/** Index bouton "commentaires". */
	const INDEX_BTN_COMMENT = 5;
	
	/** Index bouton "stats". */
	const INDEX_BTN_STATS = 6;
	
	/** translator service name. */
	const TRANSLATOR_SERVICE = 'translator';
	
	/** POST method. */
	const METHOD_POST = 'POST';
	
	/** see view. */
	const SEE_VIEW = 'SdzBlogBundle:Blog:voir.html.twig';
	
	/** home view. */
	const HOME_VIEW = 'SdzBlogBundle:Blog:index.html.twig';
	
	/** add view. */
	const ADD_VIEW = 'SdzBlogBundle:Blog:ajouter.html.twig';
	
	/** listing view. */
	const LISTING_VIEW = 'SdzBlogBundle:Blog:listing.html.twig';
	
	/** update view. */
	const UPDATE_VIEW = 'SdzBlogBundle:Blog:modifier.html.twig';
			
	/** danse view. */
	const DANSE_VIEW = 'SdzBlogBundle:Blog:danse.html.twig';

	/** chant view. */
	const CHANT_VIEW = 'SdzBlogBundle:Blog:chant.html.twig';
	
	/** ecole view. */
	const ECOLE_VIEW = 'SdzBlogBundle:Blog:ecole.html.twig';
	
	/** experience view. */
	const EXPERIENCE_VIEW = 'SdzBlogBundle:Blog:experience.html.twig';
			
	/** formation view. */
	const FORMATION_VIEW = 'SdzBlogBundle:Blog:formation.html.twig';
	
	/** message view. */
	const MESSAGE_VIEW = 'SdzBlogBundle:Blog:message.html.twig';
	
	/** organisme view. */
	const ORGANISME_VIEW = 'SdzBlogBundle:Blog:organisme.html.twig';
	
	/** realisation view. */
	const REALISATION_VIEW = 'SdzBlogBundle:Blog:realisation.html.twig';
	
	/** sport view. */
	const SPORT_VIEW = 'SdzBlogBundle:Blog:sport.html.twig';
	
	/** societe view. */
	const SOCIETE_VIEW = 'SdzBlogBundle:Blog:societe.html.twig';
	
	/** tache view. */
	const TACHE_VIEW = 'SdzBlogBundle:Blog:tache.html.twig';
	
	/** visitor view. */
	const VISITOR_VIEW = 'SdzBlogBundle:Blog:visitor.html.twig';
	
	/** page view. */
	const PAGE_VIEW = 'SdzBlogBundle:Blog:page.html.twig';
	
	/** techno view. */
	const TECHNO_VIEW = 'SdzBlogBundle:Blog:techno.html.twig';
	
	/** theatre view. */
	const THEATRE_VIEW = 'SdzBlogBundle:Blog:theatre.html.twig';
	
	/** categorie view. */
	const CATEGORIE_VIEW = 'SdzBlogBundle:Blog:categorie.html.twig';
	
	/** auteur view. */
	const AUTEUR_VIEW = 'SdzBlogBundle:Blog:auteur.html.twig';
	
	/** comment view. */
	const COMMENT_VIEW = 'SdzBlogBundle:Blog:comment.html.twig';
	
	/** view to delete an entity . */
	const DELETION_VIEW = 'SdzBlogBundle:Blog:supprimer.html.twig';
	
	/** view for CV. */
	const CV_VIEW = 'SdzBlogBundle:Blog:cv.html.twig';
	
	/** Danse class. */
	const DANSE_CLASS = 'SdzBlogBundle:Danse';
	
	/** Chant class. */
	const CHANT_CLASS = 'SdzBlogBundle:Chant';
	
	/** Ecole class. */
	const ECOLE_CLASS = 'SdzBlogBundle:Ecole';
	
	/** Experience class. */
	const EXPERIENCE_CLASS = 'SdzBlogBundle:Experience';
	
	/** Formation class. */
	const FORMATION_CLASS = 'SdzBlogBundle:Formation';
	
	/** Message class. */
	const MESSAGE_CLASS = 'SdzBlogBundle:Message';
	
	/** Organisme class. */
	const ORGANISME_CLASS = 'SdzBlogBundle:Organisme';
	
	/** Realisation class. */
	const REALISATION_CLASS = 'SdzBlogBundle:Realisation';
	
	/** Sport class. */
	const SPORT_CLASS = 'SdzBlogBundle:Sport';
	
	/** Societe class. */
	const SOCIETE_CLASS = 'SdzBlogBundle:Societe';
	
	/** Tache class. */
	const TACHE_CLASS = 'SdzBlogBundle:Tache';
	
	/** Visitor class. */
	const VISITOR_CLASS = 'SdzBlogBundle:Visitor';
	
	/** Page class. */
	const PAGE_CLASS = 'SdzBlogBundle:Page';
	
	/** Techno class. */
	const TECHNO_CLASS = 'SdzBlogBundle:Techno';
	
	/** Theatre class. */
	const THEATRE_CLASS = 'SdzBlogBundle:Theatre';
	
	/** Categorie class. */
	const CATEGORIE_CLASS = 'SdzBlogBundle:Categorie';
	
	/** Auteur class. */
	const AUTEUR_CLASS = 'SdzBlogBundle:Auteur';
	
	/** SiteComment class. */
	const SITE_COMMENT_CLASS = 'SdzBlogBundle:SiteComment';
	
	/** route l'accueil. */
	const ROUTE_HOME = 'sdzblog_accueil';
	
	/** route pour voir les auteurs. */
	const ROUTE_VOIR_AUTEURS = 'sdzblog_voir_auteurs';
	
	/** route pour supprimer un auteur. */
	const ROUTE_SUPPRIMER_AUTEUR = 'sdzblog_supprimer_auteur';
 
	/** route pour modifier les informations sur un auteur. */
	const ROUTE_MODIFIER_AUTEUR = 'sdzblog_modifier_auteur';

	/** route pour voir le detail sur un auteur. */
	const ROUTE_VOIR_AUTEUR = 'sdzblog_voir_auteur';
	
	/** route pour voir les categories de technos. */
	const ROUTE_VOIR_CATEGORIES = 'sdzblog_voir_categories';
	
	/** route pour supprimer une categorie. */
	const ROUTE_SUPPRIMER_CATEGORIE = 'sdzblog_supprimer_categorie';
 
	/** route pour modifier les informations sur une categorie. */
	const ROUTE_MODIFIER_CATEGORIE = 'sdzblog_modifier_categorie';

	/** route pour voir le detail sur une categorie. */
	const ROUTE_VOIR_CATEGORIE = 'sdzblog_voir_categorie';
	
	/** route pour voir les chants. */
	const ROUTE_VOIR_CHANTS = 'sdzblog_voir_chants';
	
	/** route pour supprimer un chant. */
	const ROUTE_SUPPRIMER_CHANT = 'sdzblog_supprimer_chant';
	
	/** route pour modifier les informations sur un chant. */
	const ROUTE_MODIFIER_CHANT = 'sdzblog_modifier_chant';
	
	/** route pour voir le detail sur un chant. */
	const ROUTE_VOIR_CHANT = 'sdzblog_voir_chant';
	
	/** route pour voir les danses. */
	const ROUTE_VOIR_DANSES = 'sdzblog_voir_danses';
	
	/** route pour supprimer une danse. */
	const ROUTE_SUPPRIMER_DANSE = 'sdzblog_supprimer_danse';
	
	/** route pour modifier les informations sur une danse. */
	const ROUTE_MODIFIER_DANSE = 'sdzblog_modifier_danse';
	
	/** route pour voir le detail sur une danse. */
	const ROUTE_VOIR_DANSE = 'sdzblog_voir_danse';
	
	/** route pour voir les ecoles. */
	const ROUTE_VOIR_ECOLES = 'sdzblog_voir_ecoles';
	
	/** route pour supprimer une ecole. */
	const ROUTE_SUPPRIMER_ECOLE = 'sdzblog_supprimer_ecole';
	
	/** route pour modifier les informations sur une ecole. */
	const ROUTE_MODIFIER_ECOLE = 'sdzblog_modifier_ecole';
	
	/** route pour voir le detail sur une ecole. */
	const ROUTE_VOIR_ECOLE = 'sdzblog_voir_ecole';
	
	/** route pour voir les experiences. */
	const ROUTE_VOIR_EXPERIENCES = 'sdzblog_voir_experiences';
	
	/** route pour voir les visiteurs. */
	const ROUTE_VOIR_VISITEURS = 'sdzblog_voir_visitors';
	
	/** route pour supprimer une experience. */
	const ROUTE_SUPPRIMER_EXPERIENCE = 'sdzblog_supprimer_experience';
	
	/** route pour modifier les informations sur une experience. */
	const ROUTE_MODIFIER_EXPERIENCE = 'sdzblog_modifier_experience';
	
	/** route pour voir le detail sur une experience. */
	const ROUTE_VOIR_EXPERIENCE = 'sdzblog_voir_experience';
	
	/** route pour voir les messages. */
	const ROUTE_VOIR_MESSAGES = 'sdzblog_voir_messages';
	
	/** route pour supprimer un message. */
	const ROUTE_SUPPRIMER_MESSAGE = 'sdzblog_supprimer_message';
	
	/** route pour modifier les informations sur un message. */
	const ROUTE_MODIFIER_MESSAGE = 'sdzblog_modifier_message';
	
	/** route pour voir le detail sur un message. */
	const ROUTE_VOIR_MESSAGE = 'sdzblog_voir_message';
	
	/** route pour voir les organismes. */
	const ROUTE_VOIR_ORGANISMES = 'sdzblog_voir_organismes';
	
	/** route pour supprimer un organisme. */
	const ROUTE_SUPPRIMER_ORGANISME = 'sdzblog_supprimer_organisme';
	
	/** route pour modifier les informations sur un organisme. */
	const ROUTE_MODIFIER_ORGANISME = 'sdzblog_modifier_organisme';
	
	/** route pour voir le detail sur un organisme. */
	const ROUTE_VOIR_ORGANISME = 'sdzblog_voir_organisme';
	
	/** route pour voir les realisations. */
	const ROUTE_VOIR_REALISATIONS = 'sdzblog_voir_realisations';
	
	/** route pour supprimer une realisation. */
	const ROUTE_SUPPRIMER_REALISATION = 'sdzblog_supprimer_realisation';
	
	/** route pour modifier les informations sur une realisation. */
	const ROUTE_MODIFIER_REALISATION  = 'sdzblog_modifier_realisation';
	
	/** route pour voir le detail sur une realisation. */
	const ROUTE_VOIR_REALISATION = 'sdzblog_voir_realisation';
	
	/** route pour voir les commentaires. */
	const ROUTE_VOIR_COMMENTS = 'sdzblog_voir_comments';
	
	/** route pour supprimer un commentaire. */
	const ROUTE_SUPPRIMER_COMMENT = 'sdzblog_supprimer_comment';
	
	/** route pour modifier les informations sur un commentaire. */
	const ROUTE_MODIFIER_COMMENT  = 'sdzblog_modifier_comment';
	
	/** route pour voir le detail sur un commentaire. */
	const ROUTE_VOIR_COMMENT = 'sdzblog_voir_comment';
	
	/** route pour voir les societes. */
	const ROUTE_VOIR_SOCIETES = 'sdzblog_voir_societes';
	
	/** route pour supprimer une societe. */
	const ROUTE_SUPPRIMER_SOCIETE = 'sdzblog_supprimer_societe';
	
	/** route pour modifier les informations sur une societe. */
	const ROUTE_MODIFIER_SOCIETE  = 'sdzblog_modifier_societe';
	
	/** route pour voir le detail sur une societe. */
	const ROUTE_VOIR_SOCIETE = 'sdzblog_voir_societe';
	
	/** route pour voir les sports. */
	const ROUTE_VOIR_SPORTS = 'sdzblog_voir_sports';
	
	/** route pour supprimer un sport. */
	const ROUTE_SUPPRIMER_SPORT = 'sdzblog_supprimer_sport';
	
	/** route pour modifier les informations sur un sport. */
	const ROUTE_MODIFIER_SPORT  = 'sdzblog_modifier_sport';
	
	/** route pour voir le detail sur un sport. */
	const ROUTE_VOIR_SPORT = 'sdzblog_voir_sport';
	
	/** route pour supprimer une tache. */
	const ROUTE_SUPPRIMER_TACHE = 'sdzblog_supprimer_tache';
	
	/** route pour modifier les informations sur une tache. */
	const ROUTE_MODIFIER_TACHE  = 'sdzblog_modifier_tache';
	
	/** route pour voir le detail sur une tache. */
	const ROUTE_VOIR_TACHE = 'sdzblog_voir_tache';
	
	/** route pour voir le detail sur un visiteur. */
	const ROUTE_VOIR_VISITOR = 'sdzblog_voir_visitor';
	
	/** route pour voir les technos. */
	const ROUTE_VOIR_TECHNOS = 'sdzblog_voir_technos';
	
	/** route pour supprimer une techno. */
	const ROUTE_SUPPRIMER_TECHNO = 'sdzblog_supprimer_techno';
	
	/** route pour modifier les informations sur une techno. */
	const ROUTE_MODIFIER_TECHNO  = 'sdzblog_modifier_techno';
	
	/** route pour voir le detail sur une techno. */
	const ROUTE_VOIR_TECHNO = 'sdzblog_voir_techno';
	
	/** route pour voir les pi�ces de theatres. */
	const ROUTE_VOIR_THEATRES = 'sdzblog_voir_theatres';
	
	/** route pour supprimer une pi�ce de theatre. */
	const ROUTE_SUPPRIMER_THEATRE = 'sdzblog_supprimer_theatre';
	
	/** route pour modifier les informations sur une pi�ce de theatre. */
	const ROUTE_MODIFIER_THEATRE  = 'sdzblog_modifier_theatre';
	
	/** route pour voir le detail sur une pi�ce de theatre. */
	const ROUTE_VOIR_THEATRE = 'sdzblog_voir_theatre';
	
	/** service gestion des droits. */
	const SECURITY_CONTEXT = 'security.context';
	
	/** role admin. */
	const ROLE_ADMIN = 'ROLE_ADMIN';
	
	/** request. */
	const REQUEST = 'request';
	
	/** visitor manager. */
	const VISITOR_MANAGER = 'sdzblog.visitor.manager';
	
	/** action manager. */
	const ACTION_MANAGER = 'sdzblog.action.manager';
	
	/** actualisation manager. */
	const ACTUALISATION_MANAGER = 'sdzblog.actualisation.manager';
	
	/** blog service. */
	const BLOG_SERVICE = 'sdzblog.blog.service';
	
	/** session.*/
	const SESSION = 'session';
	
	/** action Publish. */
	const ACTION_PUBLISH = 'PUBLISH';
	
	/** action suppress. */
	const ACTION_SUPPRESS = 'SUPPRESS';
	
	/** title attribute name. */
	const ATTRIBUTE_TITLE = 'title';
	
	/** page attribute name. */
	const ATTRIBUTE_PAGE = 'page';
	
	/** index button to activate attribute name. */
	const ATTIBUTE_BUTTON_TO_ACTIVATE = 'index_btn_to_activate';
	
	/** empty message attribute name. */
	const ATTRIBUTE_EMPTY_MESSAGE = 'emptyMessage';
	
	/** number of entities by page attribute name. */
	const ATTRIBUTE_NB_ENTITY_BY_PAGE = 'nbMaxEntitiesByPage';
	
	/** target view. */
	const ATTRIBUTE_TARGET_VIEW = 'targetView';
	
	/** index home attribute name. */
	const ATTRIBUTE_INDEX_HOME = 'accueil';
	
	/** listing attribute name. */
	const ATTRIBUTE_LISTING = 'listing';
	
	/** listing URL attribute name. */
	const ATTRIBUTE_LISTING_URL = 'listingUrl';
	
	/** form view attribute name. */
	const ATTRIBUTE_FORM_VIEW = 'form';
	
	/** redirect url attribute name. */
	const ATTRIBUTE_REDIRECT_URL = 'redirectUrl';
	
	/** detail url attribute name. */
	const ATTRIBUTE_DETAIL_URL = 'detailUrl';
	
	/** detail view attribute name. */
	const ATTRIBUTE_DETAIL_VIEW = 'detailView';
	
	/** form input publication. */
	const FORM_INPUT_PUBLICATION = 'publication';
	
	/** locale fr. */
	const LOCALE_FR = 'fr';
	
	/** locale en. */
	const LOCALE_EN = 'en';
	
	/** Locale attribute name. */
	const ATTRIBUTE_LOCALE = '_locale';
	
	/** Locale parameter name. */
	const PARAMETER_LOCALE = 'locale';
	
	/** Locale parameter name. */
	const PARAMETER_LAST_UPDATE = 'lastUpdate';
	
	/** empty string. */
	const EMPTY_STRING = '';
}
?>