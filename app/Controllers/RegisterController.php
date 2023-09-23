<?php
class RegisterController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['login'])) {
      header('Location: /mvc');
      exit;
    }

    if (isset($_POST['go'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];

      $result =  $this->validate($username, $password, $password2);

      if ($result) {
        // Validasi berhasil, lanjutkan dengan pendaftaran
        $user = $this->model('User');

        var_dump($user->userExists($username));
        // Memeriksa apakah pengguna sudah ada sebelumnya atau tidak (mungkin dengan memeriksa database)
        if ($user->userExists($username) > 0) {
          Msg::setMsg("Username <b>{$username}</b> sudah digunakan. Silakan pilih username lain.",WARN);
        } else {
          if ($user->register($_POST) > 0) {
            Msg::setMsg("Hai {$username}!! Silahkan login..",PASS);
            header('Location: /mvc/login');
            exit;
          } else {
            Msg::setMsg("Pendaftaran gagal. Silakan coba lagi.",WARN);
          }
        }
      } else {
        // Validasi gagal, tampilkan pesan kesalahan
        echo $result;
      }
    }

    $this->view('components/head', ['title' => 'Register']);
    $this->view('auth/register');
    $this->view('components/foot');
  }


  public function validate(string $username, string $password, string $password2)
  {
    // Validasi panjang username
    if (strlen($username) < 4 || strlen($username) > 20) {
      Msg::setMsg('Username harus memiliki panjang antara 4 dan 20 karakter.', WARN);
      return false;
    }

    // Validasi panjang password
    if (strlen($password) < 7 || strlen($password2) < 7) {
      Msg::setMsg('Password harus memiliki panjang minimal 7 karakter.', WARN);
      return false;
    }

    // Validasi kesamaan password
    if ($password !== $password2) {
      Msg::setMsg('Password dan konfirmasi password tidak cocok.', WARN);
      return false;
    }

    $pattern = "/^[a-zA-Z0-9]+$/";
    if (!preg_match($pattern, $username) || $username[0] === '-' || substr($username, -1) === '-') {
      Msg::setMsg('Username tidak valid. Hanya huruf dan angka diperbolehkan.', WARN);
      return false;
    }

    return true; // Tidak ada kesalahan
  }
}
