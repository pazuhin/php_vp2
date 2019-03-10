<?php

class AdminControllers extends BaseControllers
{

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

    public function form($tamplateName)
    {
        $this->view->render(
            $tamplateName,
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

        $check = $this->checkUser();

        if ($check < 1) {
            return $this->redirect('/login?error=1');
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
            'name' => ($_POST['login']),
            'age' => (trim($_POST['age'])),
            'description' => (trim($_POST['description'])),
            'password' => trim($_POST['password']),
            'file' => $_FILES['image']['name']
        ];
        $check = $this->checkUser();
        if ($check) {
            $this->redirect('/registration?errors=2');
        }
        $lastUserId = $this->model->createUser($userData);
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
        $userId = $this->model->getUserId($checkData);
        if ($userId) {
            return $userId;
        }
        return null;
    }

    public function successForm()
    {
        $this->view->render('success');
    }

    public function loadFromRegToDb($lastUserId)
    {
        $fileName = $_FILES['image']['name'];
        $this->file->loadImageFromReg($fileName, $lastUserId);
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

    public function editUser()
    {
        $currentId = $_GET['id'];
        $this->view->render('update', ['userId' => $currentId]);

        if (isset($_POST['enter'])) {
            $newUser = [
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
                'info' => trim($_POST['description'])
            ];
            if (isset($currentId)) {
                $this->model->updateUser($currentId, $newUser);
            }
        }
    }

    public function createUser()
    {
        $this->view->render('create');
        if (isset($_POST['save'])) {
            $userData = [
                'name' => ($_POST['login']),
                'age' => (trim($_POST['age'])),
                'description' => (trim($_POST['description'])),
                'password' => trim($_POST['password']),
                'file' => $_FILES['image']['name']
            ];
            $check = $this->checkUser();
            if ($check) {
                $this->redirect('/admin/create?error=3');
            }
            $lastUserId = $this->model->createUser($userData);
            $this->saveToUploads();
            $this->loadFromRegToDb($lastUserId);
        }
    }


    public function notFound()
    {
        $this->view->render('404');
    }
}