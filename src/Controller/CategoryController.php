<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/{categoryName}', name: 'show', methods: ['GET'])]
    public function show( string $categoryName): Response
    {
        $category = $this->categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException(
                'No program with id : ' . $categoryName . ' found in program\'s table.'
            );
        }

        $programs = $this->programRepository->findBy(
            ['category' => $category],
            ['id' => 'desc'],
            limit: 3,
            offset: 0,
        );

        return $this->render('program/show.html.twig', [
            'categoryName' => $category,
            'program' => $programs,
        ]);
    }
}