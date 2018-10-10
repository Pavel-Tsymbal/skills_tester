<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.10.18
 * Time: 17:01
 */

namespace App\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    public function index()
    {
        return $this->render('main/index.html.twig');
    }

}