<?php
 
class AmazonProductAPI
{
 
    private $public_key     = "AKIAIT65KFAYC64A32XQ";
    private $private_key    = "CP/UMOTD9EewJeEbbrU7PhT6CcrZj/o+jfm5ZtVW";
 
    /* 'Associate Tag' now required, effective from 25th Oct. 2011 */
    private $associate_tag  = "theskinnyonbe-20";
 
    const MUSIC = "Music";
    const DVD   = "DVD";
    const GAMES = "VideoGames";
    
    private function aws_signed_request($region,
                             $params,
                             $public_key,
                             $private_key,
                             $associate_tag)
	{
 
		$method = "GET";
		$host = "ecs.amazonaws.".$region;
		$uri = "/onca/xml";
 
 
		$params["Service"]          = "AWSECommerceService";
		$params["AWSAccessKeyId"]   = $public_key;
		$params["AssociateTag"]     = $associate_tag;
 
		$params["Timestamp"]        = gmdate("Y-m-d\TH:i:s\Z");
		$params["Version"]          = "2009-03-31";
 
		/* The params need to be sorted by the key, as Amazon does this at
		  their end and then generates the hash of the same. If the params
		  are not in order then the generated hash will be different from
		  Amazon thus failing the authentication process.
		*/
		ksort($params);
 
		$canonicalized_query = array();
 
		foreach ($params as $param=>$value)
		{
			$param = str_replace("%7E", "~", rawurlencode($param));
			$value = str_replace("%7E", "~", rawurlencode($value));
			$canonicalized_query[] = $param."=".$value;
		}
 
		$canonicalized_query = implode("&", $canonicalized_query);
 
		$string_to_sign = $method."\n".$host."\n".$uri."\n".
								$canonicalized_query;
 
		/* calculate the signature using HMAC, SHA256 and base64-encoding */
		$signature = base64_encode(hash_hmac("sha256", 
									  $string_to_sign, $private_key, True));
 
		/* encode the signature for the request */
		$signature = str_replace("%7E", "~", rawurlencode($signature));
 
		/* create request */
		$request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
 
		/* I prefer using CURL */
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
		$xml_response = curl_exec($ch);
 
		if ($xml_response === False)
		{
			return False;
		}
		else
		{
			/* parse XML and return a SimpleXML object, if you would
			   rather like raw xml then just return the $xml_response.
			 */
			$parsed_xml = @simplexml_load_string($xml_response);
			return ($parsed_xml === False) ? False : $parsed_xml;
		}
	}
	
 
    private function verifyXmlResponse($response)
    {
        if ($response === False)
        {
            throw new Exception("Could not connect to Amazon");
        }
        else
        {
            if (isset($response->Items->Item->ItemAttributes->Title))
            {
                return ($response);
            }
            else
            {
                throw new Exception("Invalid xml response.");
            }
        }
    }
 
    public function queryAmazon($parameters)
    {
        return $this->aws_signed_request("com",
                                  $parameters,
                                  $this->public_key,
                                  $this->private_key,
                                  $this->associate_tag);
    }
 
    public function searchProducts($search,$category,$searchType="UPC")
    {
        $allowedTypes = array("UPC", "TITLE", "ARTIST", "KEYWORD");
        $allowedCategories = array("Music", "DVD", "VideoGames");
 
        switch($searchType) 
        {
            case "UPC" :
                $parameters = array("Operation"     => "ItemLookup",
                                    "ItemId"        => $search,
                                    "SearchIndex"   => $category,
                                    "IdType"        => "UPC",
                                    "ResponseGroup" => "Medium");
                            break;
 
            case "TITLE" :
                $parameters = array("Operation"     => "ItemSearch",
                                    "Title"         => $search,
                                    "SearchIndex"   => $category,
                                    "ResponseGroup" => "Medium");
                            break;
 
        }
 
        $xml_response = $this->queryAmazon($parameters);
 
        return $this->verifyXmlResponse($xml_response);
 
    }
 
    public function getItemByUpc($upc_code, $product_type)
    {
        $parameters = array("Operation"     => "ItemLookup",
                            "ItemId"        => $upc_code,
                            "SearchIndex"   => $product_type,
                            "IdType"        => "UPC",
                            "ResponseGroup" => "Medium");
 
        $xml_response = $this->queryAmazon($parameters);
 
        return $this->verifyXmlResponse($xml_response);
 
    }
 
    public function getItemByAsin($asin_code)
    {
        $parameters = array("Operation"     => "ItemLookup",
                            "ItemId"        => $asin_code,
                            "ResponseGroup" => "Medium");
 
        $xml_response = $this->queryAmazon($parameters);
 
        return $this->verifyXmlResponse($xml_response);
    }
 
    public function getItemByKeyword($keyword, $product_type)
    {
        $parameters = array("Operation"   => "ItemSearch",
                            "Keywords"    => $keyword,
                            "SearchIndex" => $product_type);
 
        $xml_response = $this->queryAmazon($parameters);
 
        return $this->verifyXmlResponse($xml_response);
    }
 
}
 
?>