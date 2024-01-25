<?php

// app/mvc/UserController.php
namespace mvc;

use Smarty;

class UserController
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../views');
        $this->smarty->setCompileDir(__DIR__ . '/../../templates_c');
    }

    public function viewAction($userId)
    {
        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Retrieve user data by ID
        $user = $userModel->get_user_by_id($userId);

        // Pass user data to the template
        $this->smarty->assign('user', $user);
        $this->smarty->assign('pageTitle', 'User Profile');

        // Display the template
        $this->smarty->display('user/profile.tpl');
    }
}
