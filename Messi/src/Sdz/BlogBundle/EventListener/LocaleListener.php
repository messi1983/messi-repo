<?php
// src/Sdz/BlogBundle/EventListener/LocaleListener.php
 
namespace Sdz\BlogBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Sdz\BlogBundle\Constants\Constants;

/**
 * Locale listener.
 * @author Messi
 *
 */
class LocaleListener implements EventSubscriberInterface
{
	private $defaultLocale;
	
	public function __construct($defaultLocale = Constants::LOCALE_FR)
	{
		$this->defaultLocale = $defaultLocale;
	}
	
	public function onKernelRequest(GetResponseEvent $event)
	{
		$request = $event->getRequest();
		if (!$request->hasPreviousSession()) {
			return;
		}
	
		// on essaie de voir si la locale a �t� fix�e dans le param�tre de routing _locale
		if ($locale = $request->attributes->get(Constants::ATTRIBUTE_LOCALE)) {
			$request->getSession()->set(Constants::ATTRIBUTE_LOCALE, $locale);
		} else {
			// si aucune locale n'a �t� fix�e explicitement dans la requ�te, on utilise celle de la session
			$request->setLocale($request->getSession()->get(Constants::ATTRIBUTE_LOCALE, $this->defaultLocale));
		}
	}
	
	public static function getSubscribedEvents()
	{
		return array(
				// doit �tre enregistr� avant le Locale listener par d�faut
				KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
		);
	}
}