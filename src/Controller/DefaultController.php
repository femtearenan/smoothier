<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $image = new Image();
        $imageFile = $this->getParameter('images_directory') . 'books01.png';
        $imageFile = str_replace('\\', '/', $imageFile);
        //dump($imageFile);
        //dd($imageFile);
        $image->setFileAttributesWithImageFile($imageFile);
        $image->setAlt("Example image of books");

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'image' => $image
        ]);
    }
}
