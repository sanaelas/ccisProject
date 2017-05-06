<?php

namespace Ccis\CcisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ccis\CcisBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/index/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
	
	 /**
     * @Route("/user/{id}")
     * @Template()
	 */
	public function userAction($id){
		
		$em = $this->getDoctrine()->getManager();
		$users = $em->getRepository("CcisCcisBundle:User")->findById($id);
		
		if(!empty($users)){
			$user = $users[0];
			return array('nom' => $user->getNom(), 'prenom' => $user->getPrenom());
		}
		
		return array('nom'=> 'makayn 7ed', 'prenom' => 'makayn 7ed' );
	}
	/**
     * @Route("/entiteadministrative/{type}")
     * @Template()
	 */	
	  public function entiteadministrativeAction($type)
    {

          $repository = $this->getDoctrine()->getManager()->getRepository("CcisCcisBundle:EntiteAdministrative");
          $entiteadministratives = $repository->findByType($type);  // jani array dial entiteadministrative
		  
		  if(!empty($entiteadministratives)){
			$entiteadministrative = $entiteadministratives[0];
		  
		  return array( 'nom' => $entiteadministrative->getNom() , 'id' => $entiteadministrative ->getId()  );
      }
	  
	}

   /**
     * @Route("/addActivite/{titre}")
     * @Template()
	 */	
	  public function addActiviteAction($titre)
    {
		
	    $em = $this->getDoctrine()->getManager()->getRepository("CcisCcisBundle:Activite");
		$activite =new Activite(); //creation d objet de type activite
        $activite->setTitre($titre);
        $em->persist($titre);//Enregistrer l'objet $activite
        $em->flush();
		
      return array( 'titre' => $activite  );		
	}
	
	/**
     * @Route("/newActivite")
     * @Template()
	 */
	 
	  public function newActiviteAction()
    {
		
	 $activite=new Activite();
	 $form=$this->createFormBuilder($activite)
	     ->add("titreActivite","text")
	     ->add("resume","text")
		 ->add("detail","text")
		  ->add("Ajouter","submit")
		  ->getForm();
      return array( 'formulaire' => $form->createView()  );
}

}
