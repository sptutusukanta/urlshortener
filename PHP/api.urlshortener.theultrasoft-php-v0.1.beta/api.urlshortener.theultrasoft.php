<?PHP
	class UrlShortener{
		const METHOD_EXPAND = 'expandurl';
		const METHOD_SHORT = 'shorturl';
		public function __construct(){}
		public function expandurl($api_key, $id){
			$path	= sprintf("http://url.theultrasoft.com/api.php?method=%s&api_key=%s&data=%s",self::METHOD_EXPAND,$api_key,$id);
			$out	= urldecode(trim(file_get_contents($path)));
			if( strlen($out)==0 ) return NULL;
			return $out;
		}
		public function shorturl($api_key, $url){
			$url = urlencode($url);
			$path	= sprintf("http://url.theultrasoft.com/api.php?method=%s&api_key=%s&data=%s",self::METHOD_SHORT,$api_key,$url);
			$out	= trim(file_get_contents($path));
			if( strlen($out)==0 ) return NULL;
			return trim($out);
		}
	};
?>