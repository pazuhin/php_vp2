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
        require_once SRC_DIRECTORY.  '/Tools/Session.php';
        require_once SRC_DIRECTORY.  '/Tools/Render.php';
        require_once SRC_DIRECTORY.  '/Models/BaseModel.php';
        require_once SRC_DIRECTORY.  '/Models/Users.php';
        require_once SRC_DIRECTORY.  '/Controllers/BaseControllers.php';
        require_once SRC_DIRECTORY.  '/Controllers/AdminControllers.php';
    }

    protected function session()
    {
        session_start();
    }

    protected function db()
    {
        require_once SRC_DIRECTORY . '/Tools/Config.php';
        $db = $appConfig['db'];
        BaseModel::init($db);
    }

    public function run()
    {
        if ($_SERVER["REQUEST_URI"] == "/admin") {
            $controllers = new AdminControllers();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/login" && !empty($_POST)) {
            $controllers = new AdminControllers();
            $controllers->login();
            var_dump(1);
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/login") === 0) {
            $controllers = new AdminControllers();
            $controllers->form();
            var_dump(2);
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/logout") {
            $controllers = new AdminControllers();
            $controllers->logout();
            exit();
        } else {
            var_dump($_SERVER["REQUEST_URI"]);
        }
    }
}