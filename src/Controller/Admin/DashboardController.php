<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Coupons;
use App\Entity\Orders;
use App\Entity\Products;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProductsCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Food online');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Admin Panel');

        yield MenuItem::section('Products');

        yield MenuItem::subMenu('Orders', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Order', 'fas fa-plus', Orders::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Orders', 'fas fa-eye', Orders::class)
        ]);
        yield MenuItem::subMenu('Orders', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Order', 'fas fa-plus', Orders::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Orders', 'fas fa-eye', Orders::class)
        ]);
        yield MenuItem::subMenu('Orders', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Order', 'fas fa-plus', Orders::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Orders', 'fas fa-eye', Orders::class)
        ]);
        yield MenuItem::subMenu('Coupons', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Coupon', 'fas fa-plus', Coupons::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Coupon', 'fas fa-eye', Coupons::class)
        ]);

        yield MenuItem::subMenu('Product', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fas fa-plus', Products::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Products', 'fas fa-eye', Products::class)
        ]);

        yield MenuItem::section('Categories');

        yield MenuItem::subMenu('Category', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Create Category', 'fas fa-plus', Categories::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Categories', 'fas fa-eye', Categories::class)
        ]);
        yield MenuItem::linkToCrud('Users', 'fa fa-users', Users::class);
        yield MenuItem::linkToCrud('Users', 'fa fa-users', Users::class);
        yield MenuItem::linkToCrud('Users', 'fa fa-users', Users::class);


    }
}
