<?php
class Popular
{
  private $apiKey;

  public function __construct()
  {
    $this->apiKey = API_KEY;
  }

  public function getPopular()
  {
    $url = "https://api.themoviedb.org/3/movie/popular?language=en-US&page=1";
    $response = $this->sendRequest($url);

    return $response;
  }

  private function sendRequest($url)
  {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $this->apiKey,
        "accept: application/json"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
}
