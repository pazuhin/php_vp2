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

    public function __construct()
    {
        $this->session = new Session();
        $this->view = new Render();
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}