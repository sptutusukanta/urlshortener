<?PHP
	include_once("api.urlshortener.theultrasoft.php");
?>
<form action="">
	<input id="id" name="id"  /><input type="submit" value="Expand">
</form>
<form action="">
	<input id="url" name="url"  /><input type="submit" value="Short">
</form>
<?PHP
	$urls	= new UrlShortener();
	$path	= "http://url.theultrasoft.com";
	if(strlen($_GET['id'])>0){
		$value	= $urls->expandurl("hiqw45hj92h3q46i",$_GET['id']);
		if($value) echo "<br />ID: ".$_GET['id']." <br />EXPANDED URL: <a href='".htmlentities($value,ENT_QUOTES)."'>$value</a>"; else echo "ERROR";
	}
	if(strlen($_GET['url'])>0){
		$urls	= new UrlShortener();
		$value	= $urls->shorturl("hiqw45hj92h3q46i",$_GET['url']);
		if($value) echo "<br />URL: ".$_GET['url']." <br />SHORT URL: <a href=\"$path/$value\">$path/$value</a>"; else echo "ERROR";
	}
?>