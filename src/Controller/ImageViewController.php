<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageViewController extends AbstractController
{
    /**
     * @Route("/image/view", name="image_view")
     */
    public function index()
    {
        $response = new  Response();
        $image = new Image();
        $imageFile = $this->getParameter('images_directory') . 'books01.png';
        $imageFile = str_replace('\\', '/', $imageFile);
        $image->setFileAttributesWithImageFile($imageFile);
        $image->setAlt("Example image of books");

        $response->setContent($image->getData());
        $response->headers->set('Content-Type', $image->getFiletype());

        return $response;
    }
}
