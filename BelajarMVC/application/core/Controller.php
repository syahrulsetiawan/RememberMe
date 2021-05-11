<?php
//class class disini untuk mengambil filefile/controller pada folder view dan model, serta menjadi parent class bagi class-class pada application/controllers
class Controller
{
    public function view($view, $data = [])
    {
        require_once '../application/views/' . $view . '.php';
    }
    public function model($model)
    {
        require_once '../application/models/' . $model . '.php';
        return new $model;
    }
}
