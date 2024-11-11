<?php
namespace App;
class Controller
{
    protected function render($view, $data = [])
    {
        extract($data, EXTR_OVERWRITE);
        include "Views/$view.php";
    }
}
