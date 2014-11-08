<?php


  /**

  FUNCTIONS

  */


  function fetchSomePhotos($tencodesign, $client_id, $count)
  {

    // fetch some photos
    $client = new \Guzzle\Service\Client('https://api.instagram.com/v1/users/'.$tencodesign.'/media/');

    $response = $client->get('recent/?client_id='.$client_id.'&count='.$count)->send();

    return $response;
  }

  // ----------------- \\

  function setCacheTime()
  {

    $cache = time();
    // Write the contents back to the file
    file_put_contents('cache.txt', $cache);
    return true;

  }

  // ----------------- \\

  function cacheTime()
  {
    // figure out the when instagram photos was fetched last time
    if ( ! $cache = file_get_contents('cache.txt'))
    {

      setCacheTime();
      $ago = 0;

    }
    else
    {
      $ago = (time() - $cache)/3600; // how many hours ago did we fetch the instagram images  
    }

    return $ago;
  }

  // ----------------- \\


  function CacheTenLatestInstagramImages($response)
  {
   

    $instagrams = $response->json();

    $n = 0;
    foreach ($instagrams[data] as $k => $pic)
    {
      $temp_array[$n]['thumbnail'] = $pic['images']['thumbnail']['url'];
      $temp_array[$n]['img'] = $pic['images']['standard_resolution']['url'];
      $temp_array[$n]['tag'] = $pic['tags'][0];
      $temp_array[$n]['caption'] = $pic['caption']['text'];
      $n++;
    }
    

    #$insta_array = print_r($instagrams[data],true);
    $str = serialize($temp_array);

    // create a txt-file with this array
    // or overwrite it if existing
    file_put_contents('instagrams.txt', $str);


    return true;
  }

  // ----------------- \\

  function handleTheError()
  {
    // use fallback images?

    // email magnus@tenco.se?

    #exit("error..");
    return;
  }
