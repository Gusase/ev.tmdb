<?php

/**
 * cURL request
 */
class cUrlRequest
{
  // private $apiKey = API_KEY;
  private $apiKey = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4MDRiY2M3NzIxY2MzNDU4MWMzZWI2MzFiZTZjMzJmYyIsInN1YiI6IjY0ZmJiMzMwZGI0ZWQ2MTAzNDNkOWMwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.cm-L2lIhWUqzsFtbz76RISzwPqIQXuIBjvoYACAaTwg';

  /**
   * Get cURL Request
   *
   **/
  public function getRequest($url)
  {
    return $this->request($url);
  }

  private function request(string $url)
  {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 60,
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
      return "cURL Error #:" . $err . PHP_EOL;
    } else {
      return $response;
    }
  }
}
