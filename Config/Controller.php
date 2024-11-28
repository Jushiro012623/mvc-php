<?php
namespace Config;
class Controller
{
    protected function render($view, $data = [])
    {
        extract($data, EXTR_OVERWRITE);
        include "../src/Views/views/$view.php";
    }
}
