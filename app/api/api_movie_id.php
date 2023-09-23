<?php

// $cm = curl_init();
// curl_setopt($cm, CURLOPT_URL, "http://api.themoviedb.org/3/movie/".$id_movie."?api_key=" . $apikey);
// curl_setopt($cm, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($cm, CURLOPT_HEADER, FALSE);
// curl_setopt($cm, CURLOPT_HTTPHEADER, array("Accept: application/json"));
// $response7 = curl_exec($cm);
// curl_close($cm);
// $movie_id = json_decode($response7);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/{$id}?api_key=" . $apikey,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4MDRiY2M3NzIxY2MzNDU4MWMzZWI2MzFiZTZjMzJmYyIsInN1YiI6IjY0ZmJiMzMwZGI0ZWQ2MTAzNDNkOWMwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.cm-L2lIhWUqzsFtbz76RISzwPqIQXuIBjvoYACAaTwg",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

$detail = json_decode($response);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $e;
}
