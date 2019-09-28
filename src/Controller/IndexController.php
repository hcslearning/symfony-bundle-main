<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use HCS\SluggerBundle\Service\HCSSluggerService;
use Symfony\Component\HttpFoundation\Request;
use HCS\CatalogoBundle\Entity\Producto;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, HCSSluggerService $slugger)
    {
        $p = (new Producto())->setNombre('Smart TV LG 32"');
        $titulo = $request->query->get("titulo", "");
        $slug = $slugger->slugify($titulo);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'titulo' => $titulo,
            'slug'  => $slug,
            'producto' => $p,
        ]);
    }
}
