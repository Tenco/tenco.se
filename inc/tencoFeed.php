<?php namespace tenco;

use \Guzzle\Service as Guzzle;


	/**
	*
	* 	Class is autoloaded using psr-4
	*	autoload set up in composer.json
	*/	

class tencoFeed {

	/**
	*
	* 	set variables
	*
	*/	
	private $tencodesign = 21450120;
  	private $client_id = 'bb732030ffd9411c9f14da0647156e0f';
  	private $count = 9;
  	private $filename = 'instagrams.txt';
  	private $cache_filename = 'cache.txt';


	/**
	*
	* 	return serialized image info
	* 	from locally cached txt-file
	*/
	public function getTenLatestInstagramPhotos()
	{
		$ago = $this->cacheTime();

		// cache more than 2 hours old or file missing?
		if ($ago > 2 || ! file_get_contents($this->filename))
  		{

		    if ( ! $this->CacheTenLatestInstagramImages()) return false;

		    // set the new cache time:
			$this->setCacheTime();  

		}
		
			
		// fetch the text-file
		$response = file_get_contents($this->filename);

		return $response;
	}

  	/**
	*
	* 	fetch latest photos from 
	*	tenco instagram account using Guzzle
	*/
	public function fetchSomePhotos()
	{
		// fetch some photos
		$client = new Guzzle\Client('https://api.instagram.com/v1/users/'.$this->tencodesign.'/media/');

		$response = $client->get('recent/?client_id='.$this->client_id.'&count='.$this->count)->send();

		return $response;

  	}

  	/**
	*
	*
	*
	*/
  	public function setCacheTime()
  	{

		$cache = time();
		// Write the contents back to the file
		file_put_contents($this->cache_filename, $cache);
		
		return true;

  	}

  	
  	/**
	*
	*
	*
	*/
  	public function cacheTime()
  	{
	    // figure out the when instagram photos was fetched last time
	    if ( ! $cache = file_get_contents($this->cache_filename))
	    {

	      $this->setCacheTime();
	      $ago = 0;

	    }
	    else
	    {
	      $ago = (time() - $cache)/3600; // how many hours ago did we fetch the instagram images  
	    }

	    return $ago;
  	}

  	/**
	*
	*
	*
	*/
  	public function CacheTenLatestInstagramImages()
  	{
	   
		$response = $this->fetchSomePhotos();
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
	    
	    $str = serialize($temp_array);

	    // create a txt-file with this array
	    // or overwrite it if existing
	    file_put_contents($this->filename, $str);


	    return true;
  	}

  
  	/**
	*
	*
	*
	*/
  	public function handleTheError()
  	{
	    // use fallback images?

	    // email magnus@tenco.se?

	    return false;
  	}

}