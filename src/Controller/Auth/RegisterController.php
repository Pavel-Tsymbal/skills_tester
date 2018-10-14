<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12.10.18
 * Time: 17:45
 */

namespace App\Controller\Auth;


use App\Entity\User;
use App\Form\UserType;
use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends AbstractController
{
    private $userService;

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();

        $form =  $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->userService->newUser
            (
                $em,
                $user->getName(),
                $user->getPassword(),
                $user->getEmail()
            );

            return $this->redirect('/login');
        }

        return $this->render('auth/register/index.html.twig',['form' => $form->createView()]);
    }
}