<?php

class Application
{
    public function __construct()
    {
        $this->session();

        $this->loader();

        $this->db();
    }

    protected function loader()
    {
        require_once SRC_DIRECTORY . '/Tools/Session.php';
        require_once SRC_DIRECTORY . '/Tools/Render.php';
        require_once SRC_DIRECTORY . '/Models/BaseModel.php';
        require_once SRC_DIRECTORY . '/Models/Users.php';
        require_once SRC_DIRECTORY . '/Models/File.php';
        require_once SRC_DIRECTORY . '/Controllers/BaseControllers.php';
        require_once SRC_DIRECTORY . '/Controllers/AdminControllers.php';
    }

    protected function session()
    {
        session_start();
    }

    protected function db()
    {
        BaseModel::setConnection();
    }

    public function run()
    {
        if ($_SERVER["REQUEST_URI"] == "/admin") {
            $controllers = new AdminControllers();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/login" && !empty($_POST)) {
            var_dump(321);
            $controllers = new AdminControllers();
            $controllers->login();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/login") === 0) {
            var_dump(123);
            $controllers = new AdminControllers();
            $controllers->form('login');
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/logout") {
            $controllers = new AdminControllers();
            $controllers->logout();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/registration" && !empty($_POST)) {
            var_dump(555);
            $controllers = new AdminControllers();
            $controllers->addUsers();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/registration") === 0) {
            var_dump(777);
            $controllers = new AdminControllers();
            $controllers->registrationForm();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/success") {
            $controllers = new AdminControllers();
            $controllers->successForm();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/admin/show") {
            $controllers = new AdminControllers();
            $controllers->listUsers();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/admin/load") {
            $controllers = new AdminControllers();
            $controllers->loadFileFromAdmin();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/admin/images") {
            $controllers = new AdminControllers();
            $controllers->listImages();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/admin/update") === 0) {
            $controllers = new AdminControllers();
            $controllers->editUser();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/admin/create") {
            $controllers = new AdminControllers();
            $controllers->createUser();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/admin/create") === 0) {
            $controllers = new AdminControllers();
            $controllers->form('create');
            exit();
        } else {
            $controllers = new AdminControllers();
            $controllers->notFound();
        }
    }
}
