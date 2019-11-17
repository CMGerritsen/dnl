<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/regels", name="regels")
     */
    public function regels()
    {
        return $this->render('default/regels.html.twig', [
        ]);
    }

    /**
     * @Route("/social", name="social")
     */
    public function social()
    {
        return $this->render('default/social.html.twig', [
        ]);
    }

    /**
     * @Route("/nieuws", name="nieuws")
     */
    public function shownews(NewsRepository $newsRepository)
    {
        return $this->render('default/showpost.html.twig', [
            'news' => $newsRepository->findAll()
        ]);
    }
}
