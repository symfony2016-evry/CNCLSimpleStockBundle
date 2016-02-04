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
		//$this->get('session')->getFlashBag()
		$url = $this->get('router')->
		generate('sym16_simple_stock_homepage', array('name' => 'Jacques'));
		return new RedirectResponse($url);
	}
	
	public function listerAction() {
                $listColnames = array('ID', 'Libellé', 'Prix HT', 'Prix TTC', 'Modifier', 'Supprimer');
                $listEntities = array(
                array('id'=>'3','Vis','100','120'),
                array('id'=>'4','Ecrou','50','60'),
                array('id'=>'7','Rondelle','10','12'));
                $path=array(
                'mod'=>   'sym16_simple_stock_modifier',
                'supr'=>  'sym16_simple_stock_supprimer');
                return $this->render(
             	'SYM16SimpleStockBundle:CNCLPremierControleur:list.html.twig',
             	array('listColnames' => $listColnames, 'listEntities' => $listEntities, 'path'=>$path)
             ); 
	}
	public function modifierAction(){
		$url = $this->get('router')->
                generate('sym16_simple_stock_homepage', array('name' => 'Modifier'));
                return new RedirectResponse($url);	
	}

	 public function supprimerAction(){
                $url = $this->get('router')->
                generate('sym16_simple_stock_homepage', array('name' => 'Supprimer'));
                return new RedirectResponse($url);      
        }
}
?>

