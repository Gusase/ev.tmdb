<?php

/**
 * undocumented class
 */
class App
{

  private $controller = 'DashboardController';
  private $method = 'index';
  private array $params = [];

  public function __construct()
  {
    $url = $this->parseURL();

    if (file_exists('app/Controllers/' . $url[0] . 'Controller.php')) {
      $this->controller = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
    }
    /**
     * settings/profile
     */
    // if (isset($url[0]) && $url[0] == 'settings') {
    //   $this->controller = 'profile';
    //   unset($url[0]);
    // }
    require_once 'app/Controllers/' . $this->controller . '.php';
    $this->controller  = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      } elseif ($this->method == 'index' && count($url) == 1 && array_key_exists(1, $url)) {
        $this->method = 'profile';
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
