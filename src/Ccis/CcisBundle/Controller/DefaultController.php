<?php

namespace Ccis\CcisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ccis\CcisBundle\Entity\User;
use Ccis\CcisBundle\Entity\Activite;

class DefaultController extends Controller {

    /**
     * @Route("/index/{name}")
     * @Template()
     */
    public function indexAction($name) {
        return array('name' => $name);
    }

    /**
     * @Route("/user/create")
     * @Template()
     */
    public function ajouterUserAction(Request $request) {
        $user = new User();
        $form = $this->createFormBuilder($user)
                ->add('nom', 'text')
                ->add('prenom', 'text')
                ->add('username', 'text')
                ->add('password', 'password')
                ->add("Ajouter", "submit")
                ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        } else {
            echo 'jkaaaaaayn erreur';
        }

        return array('formulaire' => $form->createView());
    }

    /**
     * @Route("/entiteAdministrative/create")
     * @Template()
     */
    public function ajouterEntiteAdministrativeAction(Request $request) {
        $entiteadmin = new EntiteAdministrative();
        $form = $this->createFormBuilder($entiteadmin)
                ->add('nom', "text")
                ->add('type', "number")
                ->add("createur", "entity", array(
                    "class" => "Ccis\CcisBundle\Entity\User",
                    "property" => "username"
                ))
                ->add("Ajouter", "submit")
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist(entiteadmin);
            $em->flush();
        } else {
            echo 'jkaaaaaayn erreur';
        }

        return array('formulaire' => $form->createView());
    }

//    public function ajouterentiteadministrativeAction(Request $request) {
//        $entiteadmin = new EntiteAdministrative();
//        $form = $this->createFormBuilder($entiteadmin)->add('nom', TextType::class)
//                ->add('type', TextType::class)
//                ->add("Ajouter", "submit")
//                ->getForm();
//
//        return $this->render('', array(
//                    'form' => $form->createView(),
//        ));
//    }

    public function ajouteractiviteAction(Request $request) {
        $activite = new Activite();
        $form = $this->createFormBuilder($activite)->add('titre', TextType::class)
                ->add('date', DateType::class)
                ->add('resume', TextType::class)
                ->add('detail', TextType::class)
                ->add("Ajouter", "submit")
                ->getForm();

        return $this->render('', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/{id}")
     * @Template()
     */
    public function userAction($id) {

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("CcisCcisBundle:User")->findById($id);

        if (!empty($users)) {
            $user = $users[0];
            return array('nom' => $user->getNom(), 'prenom' => $user->getPrenom());
        }

        return array('nom' => 'makayn 7ed', 'prenom' => 'makayn 7ed');
    }

    /**
     * @Route("/entiteadministrative/{type}")
     * @Template()
     */
    public function entiteadministrativeAction($type) {

        $repository = $this->getDoctrine()->getManager()->getRepository("CcisCcisBundle:EntiteAdministrative");
        $entiteadministratives = $repository->findByType($type);  // jani array dial entiteadministrative

        if (!empty($entiteadministratives)) {
            $entiteadministrative = $entiteadministratives[0];

            return array('nom' => $entiteadministrative->getNom(), 'id' => $entiteadministrative->getId());
        }
    }

    /**
     * @Route("/addActivite/{titre}")
     * @Template()
     */
    public function addActiviteAction($titre) {

        $em = $this->getDoctrine()->getManager()->getRepository("CcisCcisBundle:Activite");
        $activite = new Activite(); //creation d objet de type activite
        $activite->setTitre($titre);
        $em->persist($titre); //Enregistrer l'objet $activite
        $em->flush();

        return array('titre' => $activite);
    }

    /**
     * @Route("/newActivite/")
     * @Template()
     */
    public function newActiviteAction(Request $request) {

        $activite = new Activite();

        $form = $this->createFormBuilder($activite)
                ->add("titre", "text")
                ->add("resume", "text")
                ->add("detail", "text")
                ->add("entiteadministrative", "entity", array(
                    "class" => "Ccis\CcisBundle\Entity\EntiteAdministrative",
                    "property" => "nom"
                ))
                ->add("createur", "entity", array(
                    "class" => "Ccis\CcisBundle\Entity\User",
                    "property" => "username"
                ))
                ->add("Ajouter", "submit")
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
        }

        return array('formulaire' => $form->createView());
    }

}
