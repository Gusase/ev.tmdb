<?php


// $cn = curl_init();
// curl_setopt($cn, CURLOPT_URL, "http://api.themoviedb.org/3/movie/now_playing?api_key=" . $apikey);
// curl_setopt($cn, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($cn, CURLOPT_HEADER, FALSE);
// curl_setopt($cn, CURLOPT_HTTPHEADER, array("Accept: application/json"));
// $response6 = curl_exec($cn);
// curl_close($cn);
// $nowplaying = json_decode($response6);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?language=en-US&page=1",
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

$nowplaying = json_decode($response);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}