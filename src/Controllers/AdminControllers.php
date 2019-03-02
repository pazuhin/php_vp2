<?php

class AdminControllers extends BaseControllers
{
    /**
     * личный кабинет
     */
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect('/login');
        }

        $this->view->render(
            'admin',
            [
                'user' => $this->session->getUser()
            ]
        );
    }

    /**
     * Только форма
     */
    public function form()
    {
        $this->view->render(
            'login',
            [
                'error' => !empty($_GET['error'])
            ]
        );
    }

    public function login()
    {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            throw InvalidArgumentException();
        }

        $login = strtoupper(trim($_POST['login']));
        $password = md5(trim($_POST['password']));

        if ($password !== md5('123')) {
            $this->redirect('/login?error=1');
        }

        $model = new Users();
        $model->getUser();

        $userId = $login;

        $this->session->login($userId);
        $this->redirect('/admin');
    }

    public function logout()
    {
        $this->session->logout();
        $this->redirect('/login');
    }
}