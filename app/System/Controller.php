<?php

/**
 * undocumented class
 */
class Controller
{

  protected function view(string $url, object|array $x = [])
  {
    require_once 'app/Views/' . $url . '.php';
  }

  protected function model(string $model, string|int $seriesId)
  {
    require_once 'app/Models/' . $model . '.php';
    return new $model($seriesId);
  }

  /**
   * @deprecated g guna
   */
  protected function api(string $api)
  {
    require_once 'app/api/' . $api . '.php';
    return new $api;
  }
}
