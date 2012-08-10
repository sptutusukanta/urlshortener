<?PHP
	class UrlShortener{
		const	METHOD_EXPAND	= 'expandurl';
		const	METHOD_SHORT	= 'shorturl';
		const	BASE_ON			= true;
		const	BASE_OFF		= false;
		private	$api_key;
		private	$base_path;
		public function __construct($api_key,$base_path='http://url.theultrasoft.com/'){
			if($api_key=='') return false;
			$this->api_key		= $api_key;
			$this->base_path	= substr($base_path, -1) == '/' ? $base_path : "$base_path/";
		}
		public function expandUrl( $id ){
			$path	= sprintf('http://url.theultrasoft.com/api.php?method=%s&api_key=%s&data=%s',self::METHOD_EXPAND,$this->api_key,$id);
			$out	= urldecode(trim(file_get_contents($path)));
			if( strlen($out)==0 ) return NULL;
			return $out;
		}
		
		public function shortUrl( $url , $use_base_path = self::BASE_OFF ){
			$url = urlencode( $url );
			$path	= sprintf( 'http://url.theultrasoft.com/api.php?method=%s&api_key=%s&data=%s' , self::METHOD_SHORT , $this->api_key , $url );
			$out	= trim( file_get_contents( $path ) );
			if( strlen( $out ) == 0 ) return NULL;
			return $use_base_path ? $this->base_path.$out : $out;
		}
		public function basePath(){
			return $this->base_path;
		}
	};
?>