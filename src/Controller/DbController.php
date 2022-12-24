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
     * @Route("/db/editcategory/{id}", methods={"get"})
     */
    public function editcategory($id)
    {
        //$category = $this->doctrine->getRepository(Category::class)->findOneBy(['categoryid' => $id], ['categoryname' => 'asc']);
        $category = $this->doctrine->getRepository(Category::class)->find($id);

        if (!$category) {
            $category = new Category();
        }

        return $this->render('db/editcategory.html.twig', ['category' => $category]);
    }

    /**
     * @Route("/db/editcategory/{id}", methods={"post"})
     */
    public function savecategory($id, Request $request)
    {
        //$category = $this->doctrine->getRepository(Category::class)->findOneBy(['categoryid' => $id], ['categoryname' => 'asc']);
        $category = $this->doctrine->getRepository(Category::class)->find($id);

        if (!$category) {
            $category = new Category();

            $category->setCategoryname($request->get('categoryname'));

            $this->doctrine->getManager()->persist($category);
            $this->doctrine->getManager()->flush();
        } else {
            $category->setCategoryname($request->get('categoryname'));
            $this->doctrine->getManager()->flush();
        }

        return $this->redirect('/db/categories');
    }

    /**
     * @Route("/db/delete/{id}", methods={"get"})
     */
    public function deletecategory($id)
    {

        $category = $this->doctrine->getRepository(Category::class)->find($id);

        if ($category) {
            $this->doctrine->getManager()->remove($category);
            $this->doctrine->getManager()->flush();
        }

        return $this->redirect('/db/categories');
    }
}