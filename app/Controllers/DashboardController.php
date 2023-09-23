<?php

/**
 * undocumented class
 */
class DashboardController extends Controller
{

  public function index()
  {
    $data = [
      'popular' => $this->api('Popular')->getPopular(),
      'trending' => $this->api('Trending')->getTrending()
    ];
    $backdrop = $this->getBackdrop($data, 'trending');
    $this->view('components/head', ['title' => 'The Movie Databse (TMDB)']);
    $this->view('dashboard/index',  [json_decode($data['popular'])->results, json_decode($data['trending'])->results, $backdrop]);
    $this->view('components/foot');
  }

  public function getBackdrop(array $array, string $key): ?string
  {
    $data = json_decode($array[$key]);
    if ($data && isset($data->results) && count($data->results) > 0) {
      $randIndex = array_rand($data->results, 1);
      $backdropPath = $data->results[$randIndex]->backdrop_path;
      return $backdropPath;
    } else {
      return null;
    }
  }
}
