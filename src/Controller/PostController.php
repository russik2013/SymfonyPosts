<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{

    public function index($page = 0)
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repository->findBy(array(), array('id' => 'ASC'),3, $page*3);
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'pageCount' => ceil(count($repository->findAll())/3)
        ]);
    }

    public function create()
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class,$post);
        return $this->render('post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function store(Request $request)
    {
        $allData = $request->request->all()['post_form'];
        $entityManager = $this->getDoctrine()->getManager();
        $post = new Post();
        $post->setTitle($allData['title']);
        $post->setText($allData['text']);
        $post->setDescription($allData['description']);
        $post->setStatus($allData['status']);
        $post->setCreateDate( new DateTime(implode("-", array_values($allData['create_date']))));
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirectToRoute('posts');
}

    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->find($id);
        return $this->render('post/single.html.twig', [
            'post' => $post,
        ]);
    }

    public function edit($id)
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->find($id);

        $form = $this->createForm(PostFormType::class,$post);

        return $this->render('post/edit.html.twig', [
            'form' => $form->createView(),
            'post' => $post
        ]);
    }

    public function update($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository(Post::class)->find($id);

        $allData = $request->request->all()['post_form'];

        $post->setTitle($allData['title']);
        $post->setText($allData['text']);
        $post->setDescription($allData['description']);
        $post->setStatus($allData['status']);
        $post->setCreateDate( new DateTime(implode("-", array_values($allData['create_date']))));
        $entityManager->flush();
        return $this->redirectToRoute('posts');
    }

    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Post::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return $this->redirectToRoute('posts');
    }
}
