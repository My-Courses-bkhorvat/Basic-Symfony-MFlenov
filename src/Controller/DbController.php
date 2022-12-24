<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;

class DbController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    /**
     * @Route("/db/categories")
     */
    public function categories(Request $request)
    {
        $searchfor = $request->query->get('searchfor');

        if ($searchfor) {
            $categories = $this->doctrine->getRepository(Category::class)->findBy(['categoryname' => $searchfor]);
        } else {
            $categories = $this->doctrine->getRepository(Category::class)->findBy([], ['categoryname' => 'asc']);
        }
        return $this->render('db/categories.html.twig', ['categories' => $categories, 'searchfor' => $searchfor]);
    }

    /**
     * @Route("/db/editcategory/{id}")
     */
    public function editcategory($id)
    {
        //$category = $this->doctrine->getRepository(Category::class)->findOneBy(['categoryid' => $id], ['categoryname' => 'asc']);
        $category = $this->doctrine->getRepository(Category::class)->find($id);

        return $this->render('db/editcategory.html.twig', ['category' => $category]);
    }

    /**
     * @Route("/db/createcategory/{name}")
     */
    public function createcategory($name)
    {
        $category = new Category();
        $category->setCategoryname($name);

        $this->doctrine->getManager()->persist($category);
        $this->doctrine->getManager()->flush();

        return $this->render('db/editcategory.html.twig', ['category' => $category]);
    }
}