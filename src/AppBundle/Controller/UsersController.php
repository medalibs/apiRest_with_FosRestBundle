<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;



/**
 * Description of UsersController
 *
 * @author mas
 */
class UsersController extends Controller {
    
    /**
     * Récuperation de la liste des utilisateurs.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method"
     * )
     */
    public function getUsersAction()
    {
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $users = $repository->findAll();
        
        return $users;
        
    }
    
    /**
     * Récuperation informations d'un utilisateur.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method"
     * )
     */
    
    public function getUserAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $user = $repository->find($id);
        
        return $user;
        
    }
    
    /**
     * Modification utilisateur.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method"
     * )
     */
    
    public function putUsersAction()
    {
        
    }
    
    /**
     * Ajout d'un nouveau utilisateur.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method"
     * )
     */
    
    public function postUsersAction(Request $request)
    {
        
        $jsonObject = json_decode($request->getContent(), true);
         
        
        $user = new User();
        $user->setEmail($jsonObject['email']);
        $user->setFirstName($jsonObject['firstname']);
        $user->setLastName($jsonObject['lastname']);
        $user->setEnabled($jsonObject['enabled']);
        
        $createdAt = new \DateTime();
        $createdAt->format("Y-m-d H:i:s");
        
        $user->setCreatedAt($createdAt);
        
        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return array("error" => $errorsString);
        }
        
        $em = $this->getDoctrine()->getManager();

        
        $em->persist($user);

        
        $em->flush();

        return array('id' => $user->getId());
        
        
        
    }
    
    
    /**
     * Verifier un utilisateur
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method"
     * )
     */
    public function getUserVerifAction($id)
    {
        
    }
    
}
