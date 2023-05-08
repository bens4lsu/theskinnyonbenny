<?php

class Playlist 
{
	public $playlist;    // object of type SimpleXMLElement
    public $origXML;

	function __construct($playlistFile)
	{
        // if this returns a cached version of the file, try using a true file-path instead of a url to the file.
        $this->origXML = file_get_contents ($playlistFile);
		$this->playlist = new SimpleXMLElement($this->origXML);
	}

	
	private function generate_random_letters($length) 
	{
        $id = '';
        for ($i = 0; $i < $length; $i++) {
            $random = rand(48, 122);
            if ($random >= 48 && $random <= 57 || $random >= 65 && $random <= 90 || $random >= 97 && $random <= 122) {
                $id .= chr ($random);
            }
            else{
                $i--;
            }
        }
        return $id;
    }
    
    private function RatingsArray()
	{
		$Ratings = array();
		$starImg = '<img src="/img/star.png" alt="*">';

		$Ratings[0] = '&nbsp;';
		for ($i = 1; $i <= 5; $i++) {
			$Ratings[$i*20] = '';
			for ($j = 1; $j <= $i; $j++) {
				$Ratings[$i*20] .= $starImg;
			}
		}
		return $Ratings;
	}


	private function ItunesLink()
	{

	}

	
	private function AmazonLinks($artist, $album, $song)
	{
		$params = Array(
			"Operation"=>'ItemSearch',
			"SearchIndex"=>'MP3Downloads',
			"ResponseGroup"=>'ItemAttributes,Tracks,Images',
			"Keywords"=>$artist.'; '.$song.'; '.$album
		);
		$am = new AmazonProductAPI();
		$xml_response=$am->queryAmazon($params);
		$asin = $xml_response->Items->Item[0]->ASIN;
		$url = $xml_response->Items->Item[0]->DetailPageURL;
		return array("ASIN"=>$asin, "url"=>$url);
	}
	
	function AmazonWidget($limit = PHP_INT_MAX)
	{
	
	}
	

	function HtmlTable($limit = PHP_INT_MAX, $linkAmazon = true, $linkItunes = false)
	{
		
        //$this->ShowObjectData();
        
        $Ratings = $this->RatingsArray();
		$html= '<table><tr><th>&nbsp;</th><th>Artist</th><th>Song</th><th>Album</th><th>Last Played</th><th>Plays</th><th>Rating</th><th>Try</th></tr>'.PHP_EOL;
        
		foreach ($this->playlist->song as $song ){
            if ($song->order <= $limit) {
	            $html .= '<tr><td>'.$song->order.'</td><td>'.$song->artist.'</td><td>'.$song->name.'</td><td>'.$song->album.'</td><td>'.$song->lastPlayed.'</td><td style="text-align:center">'.$song->playcount.'</td><td>'.$Ratings[intval($song->rating)].'</td><td>';
			
				// do we put an amazon or an itunes link in this last column?
				if ($linkAmazon){
					$url = '/playlists/amazonRedirect.php?artist='
						.urlencode($song->artist).'&song='
						.urlencode($song->name).'&album='
						.urlencode($song->album);
					$html .= '<a href="'.$url.'" target="_blank"><img src="/img/amazon-logo.jpg" alt="See on Amazon" style="height:1em;"></a>'; //link/img for amazon
				}
				
				if ($linkItunes){
					$html .= '';  // link and image for itunes
				}
				
				if (!$linkAmazon && !$linkItunes){
					$html .= '&nbsp;';
				}
				
				$html .= '</td></tr>'.PHP_EOL;
			}            
		}
        $html.='</table>';
		return $html;
	}
	
	function HtmlTableNarrow($limit = PHP_INT_MAX, $linkAmazon = true, $linkItunes = true)
	{
		
        //$this->ShowObjectData();
        
        $Ratings = $this->RatingsArray();
		$html= '<table><tr><th>&nbsp;</th><th>Artist</th><th>Song</th><th>Album</th><th>Played</th></tr>'.PHP_EOL;
        
		foreach ($this->playlist->song as $song ){
            if ($song->order <= $limit) {
	            $html .= '<tr><td>'.$song->order.'</td><td>'.$song->artist.'</td><td>'.$song->name.'</td><td>'.$song->album.'</td><td>'.$song->lastPlayed.'</tr>'.PHP_EOL;
            }
		}
        $html.='</table>';
		return $html;
	}

	function ShowObjectData()
	{
		print '<pre>';
        print_r($this->playlist);
        print_r($this->origXML);
        print '</pre>';
	}
	
	
	function PlaylistName()
	{
		return $this->playlist->attributes()->pl;
	}
	
	function PlayListComment()
	{
		return $this->playlist->attributes()->comment;
	}

}

?>