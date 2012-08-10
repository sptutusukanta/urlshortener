<?PHP     
    include_once("ibs/api.urlshortener.theultrasoft.php"); // include our API Library
     
    // UrlShortener Class contains all the functions which can be used
    // in URL Shortening and some other features

    $API_Key	= '********************************'; // API Key required by the Class to be used
	
	// BasePath is a URL 'http://url.theultrasoft.com' (default). It must start with 'http://'
    // BasePath is used for the Shortened URL. That is, BasePath/ID will redirect to original URL
	// If you are not aware of this, don't use this option Thats why we commented this section
	
    $base_path   = 'http://localhost/url.theultrasoft.com';
    $urls       = new UrlShortener( $API_Key, $base_path ); // Create an instance of UrlShortener using Base Path
	
    // Create an instance of UrlShortener without Base Path (Recomended)
    //$urls		= new UrlShortener($API_Key);
    
    
    // -------- Method to Short Long URL ----------------------------------------------------------
     
    // A long which can be of any length to be shortened
    $long_url	= 'http://www.theultrasoft.com/demographic-statistics-on-url-shortener/';
     
    $id			= $urls->shortUrl( $long_url ); // Shortening returns the id of the short url
    // If you want it with Base Path included, use like this:
    // $shorturl = $urls->shorturl( $long_url, UrlShortener::BASE_ON);
    // This will return the shortened URL that is BasePath/ID
    
    // You can get the Base Path by using the follwing method.
	$base_path = $urls->basePath();
    // Check if the URL is shortened or not. It yes then the shortened URL is BasePath/ID
    if($id) echo "Short URL : ".$base_path.$id;
     
    // -------- Method to retrive the Actual URL --------------------------------------------------
     
    // Now Expanding the URL by using the ID the Actual URL is again returned
    $url        = $urls->expandUrl($API_Key,$id);
     
    if($url) echo "Original URL: $url"; // Check if we got the Actual URL or Not
	//-----------------------------------------------------------------------------
    // : NOTE :
    //    You can use Custom BasePath. To do this you need to create your own
    //    Actual URL return method which will redirect by your BasePath
    //    If you have any confusion about this, the default BasePath is recomended
    //-----------------------------------------------------------------------------
?>