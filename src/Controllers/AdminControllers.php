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

        //$login = strtoupper(trim($_POST['login']));
        $check = $this->checkUser();
        if ($check < 1) {
            var_dump($check);
            $this->redirect('/login?error=1');
            var_dump($check);
        }
        $userId = $check;

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
            'password' => md5(trim($_POST['password'])),
            'file' => $_FILES['image']['name']
        ];
        $check = $this->checkUser();
        if ($check) {
            $this->redirect('/registration?errors=2');
        }
        $this->model->setUser($userData);
        $lastUserId = $this->model->getLastId();
        $this->saveToUploads();
        $this->loadFromRegToDb($lastUserId);
        $this->redirect('/success');
    }

    public function saveToUploads()
    {
        if (!empty($_FILES['image']['tmp_name'])) {
            $fileContent = file_get_contents($_FILES['image']['tmp_name']);
            file_put_contents('../public/uploads/' . $_FILES['image']['name'] . '.jpg', $fileContent);
        }
    }

    public function checkUser()
    {
        $checkData = [
            'name' => ucfirst(trim($_POST['login'])),
            'password' => md5(trim($_POST['password']))
        ];
        $checkUser = $this->model->getUser($checkData);
        if ($checkUser) {
            return $checkUser;
        } else {
            return null;
        }
    }

    public function successForm()
    {
        $this->view->render('success');
    }

    public function loadFromRegToDb($lastUserId)
    {
        $fileName = $_FILES['image']['name'];
        $this->file->saveToDb($lastUserId, $fileName);
    }

    public function listUsers()
    {
        $this->view->render('listUsers', ['usersList' => $this->model->getAll()]);
    }

    public function listImages()
    {
        $this->view->render('imageList', ['imageList' => $this->file->getImages($this->session->getUser())]);
    }

    public function loadFileFromAdmin()
    {
        $this->view->render('/loadFile');
        if (isset($_POST['upload'])) {
            $image = $_FILES['filename']['name'];
            $this->file->loadImage($image, $this->session->getUser());
        }
    }

    public function notFound()
    {
        $this->view->render('404');
    }
}