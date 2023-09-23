<?php

/**
 * class profile as user
 */
class ProfileController extends Controller
{

  public function index()
  {
    $data = $this->model('User')->getAllUsers();
    $this->view('components/head', ['title' => 'All users']);
    $this->view('profile/index',  ['user' => $data]);
    $this->view('components/foot');
  }

  public function profile($username)
  {
    $data = [$this->model('User')->getUser($username)];
    $this->view('components/head', ['title' => "Profile {$data[0]->username}"]);
    $this->view('profile/detail', $data);
    $this->view('components/foot');
  }

  public function logout()
  {
    session_start();
    // $_SESSION = [];
    // session_unset();
    // session_destroy();
    unset($_SESSION['login']);
    header('Location: /mvc');
    exit;
  }
}
