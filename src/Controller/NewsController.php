<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/nieuws", name="nieuws")
     */
    public function index()
    {
        /*
         * Entity: News
         * Title
         * Content
         */

        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController',
        ]);
    }
}
