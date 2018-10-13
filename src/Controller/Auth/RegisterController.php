<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12.10.18
 * Time: 17:45
 */

namespace App\Controller\Auth;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    public function index()
    {
        return $this->renderView('auth/register/index.html.twig');
    }

}