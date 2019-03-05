<?php
/*
Plugin Name: Api Crida Plugin
*/

// Load composer Objects
require 'vendor/autoload.php';

function postClientExample() {
  $client = new GuzzleHttp\Client();
  $res = $client->request('POST', 'https://httpbin.org/post', [
      'headers' => ['X-Api-Key' => 'MySuperSecretKey'] ,
      'json' => [
          'field_name' => 'abc',
          'other_field' => '123',
          'nested_field' => [
              'nested' => 'hello'
          ]
      ]
  ]);

  if ($res->getStatusCode() == "200") {
    echo "<pre>" . $res->getBody() . "</pre>";
  }
}


function route_pentagon_api() {
   if($_SERVER["REQUEST_URI"] == '/pent-api/') {
      postClientExample();
      exit();
   }
}

add_action( 'parse_request', 'route_pentagon_api');
