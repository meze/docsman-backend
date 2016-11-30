<?php
declare(strict_types = 1);
namespace AppBundle\Controller;

final class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/index.html.php');
    }
}
