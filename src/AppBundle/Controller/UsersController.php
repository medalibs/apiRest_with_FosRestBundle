<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Description of UsersController
 *
 * @author mas
 */
class UsersController extends Controller {
    
    public function getUsersAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $users = $repository->findAll();
        
        return $users;
        
    }
    
    public function getUserAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        $user = $repository->find($id);
        
        return $user;
        
    }
    
    public function putUsersAction()
    {
        
    }
    
    public function postUsersAction()
    {
        
    }
    
    public function getUserVerifAction($id)
    {
        
    }
    
}
