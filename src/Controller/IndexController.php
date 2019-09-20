<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use HCS\SluggerBundle\Service\HCSSluggerService;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, HCSSluggerService $slugger)
    {
        $titulo = $request->query->get("titulo", "");
        $slug = $slugger->slugify($titulo);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'titulo' => $titulo,
            'slug'  => $slug
        ]);
    }
}
