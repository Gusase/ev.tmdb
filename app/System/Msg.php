<?php

/**
 * undocumented class
 */
class Msg
{
  public static function setMsg($msg, $type)
  {
    $_SESSION['info'] = [
      'msg' => $msg,
      'type' => $type
    ];
  }

  public static function info()
  {
    if (isset($_SESSION['info'])) {
      echo '<div class="flex items-center p-4 mb-4 rounded-lg dark:bg-gray-800' . $_SESSION['info']['type'][0] .
        $_SESSION['info']['type'][1] .
        $_SESSION['info']['type'][2] . '" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">' .
        $_SESSION['info']['msg']
        . '</div>
      </div>';
      unset($_SESSION['info']);
    }
  }
}
