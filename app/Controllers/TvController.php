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
    $data = $this->model('Tv', $series);
    $crw = $data->getCastCrew();
    $dataDetail = $data->getDetail();
    $this->redirectIfErr($dataDetail);

    $date = Helper::airingDate($dataDetail->first_air_date, $dataDetail->first_air_date);

    $this->view('components/head', ['title' => "{$dataDetail->name} (TV Series {$date->start}-{$date->last})"]);
    $this->view('dashboard/tv/detail', ['dataTv' => $dataDetail, 'crew' => $crw->cast]);
    $this->view('components/foot');
  }

  public function redirectIfErr(object $data): void
  {
    if (isset($data->success) && !$data->success) {
      $this->view('components/head', ['title' => 'Page Not Found']);
      $this->view('components/404');
      $this->view('components/foot');
      exit;
    }
  }
}
