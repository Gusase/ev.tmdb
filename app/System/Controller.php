<?php

/**
 * undocumented class
 */
class Controller
{

  protected function view(string $url, object|array $data = [])
  {
    require_once 'app/Views/' . $url . '.php';
  }

  protected function model(string $model)
  {
    require_once 'app/Models/' . $model . '.php';
    return new $model;
  }

  protected function api(string $api)
  {
    require_once 'app/api/' . $api . '.php';
    return new $api;
  }
}
