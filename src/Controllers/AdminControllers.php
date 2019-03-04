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
        $check = $this->checkUser();
        var_dump($check);
        if (!$check) {
            var_dump($check);
            $this->redirect('/login?error=1');
            var_dump($check);
        }
        $userId = $login;

        $this->session->login($userId);
        $this->redirect('/admin');
    }

    public function logout()
    {
        $this->session->logout();
        $this->redirect('/login');
    }

    public function registrationForm()
    {
        $this->view->render('reg');

    }

    public function addUsers()
    {
        $userData = [
            'name' => ucfirst(trim($_POST['login'])),
            'age' => (trim($_POST['age'])),
            'description' => (trim($_POST['description'])),
            'password' => md5(trim($_POST['password']))
        ];
        $check = $this->checkUser();
        if ($check) {
            $this->redirect('/registration?errors=2');
        }

        $this->model->setUser($userData);
        $this->redirect('/success');
    }

    public function checkUser()
    {
        $checkData = [
            'name' => ucfirst(trim($_POST['login'])),
            'password' => md5(trim($_POST['password']))
        ];
        $checkUser = $this->model->getUser($checkData);
        if ($checkUser) {
            return true;
        } else {
            return null;
        }
    }

    public function successForm()
    {
        $this->view->render('success');
    }
}