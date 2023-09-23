<?php

/**
 * undocumented class
 */
class LoginController extends Controller
{
  public function index()
  {
    $this->view('components/head', ['title' => 'Login']);
    $this->view('auth/login');
    $this->view('components/foot');

    if (isset($_SESSION['login'])) {
      header('Location: /mvc');
    }

    if (isset($_POST['go'])) {
      $username = $_POST['username'];
      $credential = $this->model('User')->getUser($username);

      if (empty($credential)) {
        echo 'username atau kata sandi salah!';
        $this->view('auth/login', $_POST);
      }

      if (password_verify($_POST['password'], $credential->password)) {
        $_SESSION['login'] = $credential->name;
        echo 'Berhasil masuk!';
        header('Location: /mvc');
        exit;
      }
    }
  }
}
