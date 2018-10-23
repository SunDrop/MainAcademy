<?php
namespace Controller;

use Model\User;
use View\User as UserView;

class UserController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listAction()
    {

    }

    public function showAction($id)
    {
        $user = new User($this->pdo);
        $user->getById($id);

        UserView::render($user->asArray());
    }
}