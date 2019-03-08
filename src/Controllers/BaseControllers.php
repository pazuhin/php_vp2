<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.03.19
 * Time: 16:46
 */

abstract class BaseControllers
{
    protected $session;

    protected $view;

    protected $model;

    protected $file;

    public function __construct()
    {
        $this->session = new Session();
        $this->view = new Render();
        $this->model = new Users();
        $this->file = new File();
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}