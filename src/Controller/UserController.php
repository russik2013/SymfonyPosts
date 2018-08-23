<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index($page = 0)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findBy(array(), array('id' => 'ASC'),3, $page*3);
        return $this->render('user/index.html.twig', [
            'users' => $users,
            'pageCount' => ceil(count($repository->findAll())/3)
        ]);
    }

    public function create()
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user);
        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function store(Request $request)
    {
        $allData = $request->request->all()['user_form'];
        $entityManager = $this->getDoctrine()->getManager();
        $post = new User();
        $post->setName($allData['name']);
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirectToRoute('users');
    }

    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        //dd($user->getMetaId());
        return $this->render('user/single.html.twig', [
            'user' => $user,
        ]);
    }
}
