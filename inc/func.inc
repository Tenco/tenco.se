<?php

 /**

  SETTINGS

  */
  
  $tencodesign = 21450120;
  $client_id = 'bb732030ffd9411c9f14da0647156e0f';
  $count = 10;

 /**

  FUNCTIONS

  */
  function setCacheTime()
  {

    $cache = time();
    // Write the contents back to the file
    file_put_contents('cache.txt', $cache);
    return true;

  }

  function CacheTenLatestInstagramImages($response)
  {
  
    $instagrams = $response->json();
    
    foreach ($instagrams as $key => $instagram)
    {
      
      if ( $key === 'data')
      {
        foreach ($instagram as $k => $pic)
        {
          $img =  $pic['images']['standard_resolution']['url'].',';
          file_put_contents('instagrams.txt', $img, FILE_APPEND | LOCK_EX);
        }
      }

    }

    return true;
  }