<?php

/**
 * A Helper class / random method
 */
class Helper
{
  public static function airingDate($first, $last): object
  {
    $ds = date('Y', strtotime($first));
    $de = (isset($last) && date('Y', strtotime($last)) != date('Y')) ? date('Y', strtotime($last)) : null;

    return (object)[
      'start' => $ds,
      'last' => $de,
    ];
  }
}
