<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/author')]
class AuthorController extends AbstractController
{
  #[Route('', name: 'app_admin_author_index', methods: ['GET'])]
  public function index(Request $request, AuthorRepository $authorRepository): Response
  {
    // $dates = [];
    // if ($request->query->has('start')) {
    //   $dates['start'] = $request->query->get('start');
    // }

    // if ($request->query->has('end')) {
    //   $dates['end'] = $request->query->get('end');
    // }

    // $authors = $authorRepository->findByDateOfBirth($dates);
    $authors = $authorRepository->findAll();


    return $this->render('admin/author/index.html.twig', [

      'authors' => $authors,
    ]);
  }
  #[Route('/new', name: 'app_admin_author_new', methods: ['GET', 'POST'])]
  public function new(Request $request, EntityManagerInterface $manager): Response
  {
    $author = new Author();
    $form = $this->createForm(AuthorType::class, $author);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($author);
      $manager->flush();

      return $this->redirectToRoute('app_admin_author_new');
    }

    return $this->render('admin/author/new.html.twig', [
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_admin_author_show', requirements: ['id' => '\d+'], methods: ['GET'])]
  public function show(?Author $author): Response
  {
    return $this->render('admin/author/show.html.twig', [
      'author' => $author,
    ]);
  }


}
