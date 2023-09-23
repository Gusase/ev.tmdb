<?php

/**
 * undocumented class
 */
class TvController extends Controller
{
  public function index()
  {
    $this->view('components/head', ['title' => 'TV']);
    $this->view('dashboard/tv/index');
    $this->view('components/foot');
  }

  public function profile($series)
  {
    $data = $this->api('TvDetails')->getDetail($series);
    if (isset($data->success) && !$data->success) {
      $this->view('components/head', ['title' => 'Page Not Found']);
      $this->view('components/404');
      $this->view('components/foot');
      exit;
    }
    $ds = date('Y', strtotime($data->first_air_date));
    $de = (isset($data->last_air_date) && date('Y', strtotime($data->last_air_date)) != date('Y')) ? date('Y', strtotime($data->last_air_date)) : null;
    $this->view('components/head', ['title' => "{$data->name} (TV Series {$ds}-{$de})"]);
    $this->view('dashboard/tv/detail',$data);
    $this->view('components/foot');
  }
}
