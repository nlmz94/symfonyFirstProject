<?php

namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends AbstractController {
    /**
     * @Route("/", name="home")
     */
    public function home() {
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $article->setTitle("un titre");
        $article->setDescription("une decritpion");
        $article->setImage("une image");
        $article->setPublished(true);
        $em->persist($article);
        $em->flush();
        return $this->render('index.html.twig', [
            'article' => $article
        ]);
    }

    /**
     * @Route("/params/{name}", name="name", defaults={"name" : "BOB"}, methods={"GET"})
     */
    public function params(string $name) {
        return new Response("Bonjour monsieur : $name");
    }
}

?>