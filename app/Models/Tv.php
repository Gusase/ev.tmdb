<?php

/**
 * TV Api
 */
class TV extends cUrlRequest
{
  private $series;

  public function __construct($series)
  {
    $this->series = $series;
  }

  /**
   * Get the details of a TV show.
   *
   * @return object
   **/
  public function getDetail(): object
  {
    $url = "https://api.themoviedb.org/3/tv/{$this->series}?language=en-US";
    $response = $this->getRequest($url);

    return json_decode($response);
  }

  /**
   * Get the videos that belong to a TV show.
   *
   * @return object
   **/
  public function getVideos(): object
  {
    $url = "https://api.themoviedb.org/3/tv/{$this->series}/videos?language=en-US";
    $respone = $this->getRequest($url);

    return json_decode($respone);
  }
  /**
   * Get a list of TV shows airing today.
   *
   * @param int $page by page?
   * @return object
   **/
  public function getAiringToday(int $page = 1): object
  {
    $url = "https://api.themoviedb.org/3/tv/airing_today?language=en-US&page={$page}";
    $responee = $this->getRequest($url);

    return json_decode($responee);
  }

  /**
   * Get a list of TV shows that air in the next 7 days.
   *
   * @param int $page by page?
   * @return object
   */
  public function getOnAir(int $page = 1): object
  {
    $url = "https://api.themoviedb.org/3/tv/on_the_air?language=en-US&page={$page}";
    $responee = $this->getRequest($url);

    return json_decode($responee);
  }

  /**
   * Get a list of TV shows ordered by rating.
   *
   * @param int $page by page?
   * @return object
   */
  public function getTopRated(int $page = 1): object
  {
    $url = "https://api.themoviedb.org/3/tv/top_rated?language=en-US&page={$page}";
    $responee = $this->getRequest($url);

    return json_decode($responee);
  }

  /**
   * Get a list of TV shows ordered by popularity.
   *
   * @param int $page by page?
   * @return object
   */
  public function getPopular(int $page = 1): object
  {
    $url = "https://api.themoviedb.org/3/tv/popular?language=en-US&page={$page}";
    $responee = $this->getRequest($url);

    return json_decode($responee);
  }

  /**
   * Get the aggregate credits (cast and crew) that have been added to a TV show.
   *
   * @return object
   */
  public function getCastCrew(): object
  {
    $url = "https://api.themoviedb.org/3/tv/{$this->series}/aggregate_credits?language=en-US";
    $responee = $this->getRequest($url);

    return json_decode($responee);
  }
}
