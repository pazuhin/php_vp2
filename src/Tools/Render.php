<?php

class Render
{
    private $templateDirectory;

    public function __construct()
    {
        $this->templateDirectory = realpath(__DIR__ . '/../Views');
    }

    public function render($template, $data = [])
    {
        $path = $this->templateDirectory . DIRECTORY_SEPARATOR . $template . '.php';

        if (!file_exists($path)) {
            throw RuntimeException();
        }

        extract($data);
        include $path;
    }
}