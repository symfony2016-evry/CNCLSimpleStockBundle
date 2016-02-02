<?php

namespace SYM16SimpleStockBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CNCLPremierControleurController extends Controller
{
	public function iLikeAction($verbe){
		return new Response("J'aime beaucoup ".$verbe.'');
	}

	public function produitAction($multiplicande, $multiplicateur){
		$produit = hexdec($multiplicande) *  hexdec($multiplicateur);
		return $this->render(
		'SYM16SimpleStockBundle:CNCLPremierControleur:produit.html.twig',
		array('multiplicande'  => $multiplicande,
		      'multiplicateur' => $multiplicateur,
                      'resultat'       => $produit)
		);
        }

	public function racineAction($valeur, $radical){
		$this->get('session')->getFlashBag()
		$url = $this->get('router')->
		generate('sym16_simple_stock_homepage', array('name' => 'Jacques'));
		return new RedirectResponse($url);
	}
}
?>
