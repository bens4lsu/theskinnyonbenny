<?php

define('DB_SERVER', '10.4.0.199');
define('DB_DATABASE', 'sites_theskinny');	
define('DB_USER', 'theskinn_user');
define('DB_PASSWORD', 'dN)h~H5AzrzLsT552d37880#9305'); 
define('DB_DSN', 'mysql:dbname=sites_theskinny;host=10.4.0.199;charset=utf8');

    
class Db extends PDO 
{
	private $dsn = DB_DSN;
	private $user = DB_USER;
	private $password = DB_PASSWORD;
	public $stmt;
	public $error;
	public $numRowsAffected; 
	public $insertIdentity;  
	
	public function __construct(){
		$options = array (/*PDO::ATTR_PERSISTENT => true,*/ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$i = 0;
		ini_set("default_socket_timeout", 10);
		while ($i < 150){    //  PDO very occasionally gets an error "Mysql server disappeared"
		                   //  An attempt or two to retry the connection usually resolves the issue.
            try {
                parent::__construct($this->dsn, $this->user, $this->password, $options);
                $this -> exec("SET CHARACTER SET utf8");
                $this->setAttribute( PDO::ATTR_PERSISTENT, true );
                break;
            }
            catch (PDOException $e){
                $this->error = $e->getMessage();
                print $this->error;
                $i++;
            }
        }
	}
	
	
	private function substitueArrayValues($statement, array $arrays) {
        foreach($arrays as $token => $data) {
        	$replaceText = '(';
            foreach($data['values'] as $value) {
                if ($data['type'] == 'quoted'){
                	$replaceText .= "'$value', ";
                }
                else {
                	$replaceText .= "$value, ";
                }
            }
            $replaceText = substr($replaceText, 0, strlen($replaceText) - 2);
            $replaceText .= ')';
            $statement = str_replace ($token, $replaceText, $statement);
        }
        return $statement;
    }
    
    
	/*  Private format functions  */
	
	private function prepDateForInsert($dateIn, $timeIn = '00:00', $returnDateOnly = false){
	    if ($dateIn === null || $dateIn == ''){
	        return null;
	    }
	    if ($returnDateOnly){
            return date ("Y-m-d", strtotime($dateIn.' '.$timeIn));
	    }
		return date ("Y-m-d H:i", strtotime($dateIn.' '.$timeIn));
	}
	
	private function prepDateForInsert_vi($inputString){
	    // input looks like mm/dd  h:mm  PM
	    $currentYear = date("Y");
	    $currentMonth = date("m");
	    $month = substr($inputString, 0, 2);
	    $day = substr($inputString, 3, 2);
	    $year = $month >= 8 || ($month == 1 && $currentMonth == 1) ? $currentYear : $currentYear + 1;
	    $hour = substr($inputString, 7, strpos($inputString, ':') - 7);
	    $minute = substr($inputString, strpos($inputString, ':') + 1, 2);
	    $ampm = substr($inputString, strpos($inputString, ':') + 4, 2);
	    $datestring = "$year-$month-$day $hour:$minute$ampm";
	    return date("Y-m-d H:i", strtotime($datestring));
	}
	
	private function stripMaskCharacters($strIn){
            $strOut = str_replace (' ', '', $strIn);
            $strOut = str_replace ('-', '', $strOut);
            $strOut = str_replace ('(', '', $strOut);
            $strOut = str_replace (')', '', $strOut);
            return $strOut;
	}
	
	/*  Execute functions  */
	
	public function selectRowAssoc(){
            try {
                $this->stmt->execute();
                $this->numRowsAffected = $this->stmt->rowCount();
                $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
                $this->stmt = null;
                if ($result === true){
                    return true;
                }
                return $result;
            }
            catch (PDOException $e){
                $this->error = $e->getMessage();
                $this->stmt = null;
                return false;			
            }
	}
	
	public function selectRowsArrayAssoc(){
            try {
                $this->stmt->execute();
                $this->numRowsAffected = $this->stmt->rowCount();
                $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                $this->stmt = null;
                if ($result === true){
                    return true;
                }
                return $result;			
            }
            catch (PDOException $e){
                $this->error = $e->getMessage();
                $this->stmt = null;
                return false;
            }
	}
	
	public function selectRowsIntoJsonArray(){
            if ($result = $this->selectRowsArrayNum()){
                $this->stmt = null;
                if ($result === true){
                    return true;
                }
                $indexedRows = array();
                foreach ($result as $row){
                        $indexedRows[] = $row;
                }
                $keyedData = array ("data" => $indexedRows);
                //$jsonData = json_encode($keyedData, JSON_UNESCAPED_UNICODE);
                $jsonData = json_encode($keyedData);
                str_replace('/r', '<br>', $jsonData);
                return $jsonData;
            }
            else {
                    $this->stmt = null;
                    return false;
            }
	}
	
	public function selectFirstRowIntoJsonObject(){
            if ($result = $this->selectRowsArrayAssoc()){
                $this->stmt = null;
                    $jsonData = json_encode($result[0]);
                    str_replace('/r', '<br>', $jsonData);
                    return $jsonData;
            }
            else {
                $this->stmt = null;
                    return false;
            }
	}
	
	public function selectRowsArrayNum(){
            try {
                $this->stmt->execute();
                $this->numRowsAffected = $this->stmt->rowCount();
                $result = $this->stmt->fetchAll(PDO::FETCH_NUM);
                if ($result === true || is_array($result) && empty($result)){
                    return true;
                }
                return $result;
            }
            catch (PDOException $e){
                //print_r($e);
                $this->error = $e->getMessage();
                $this->stmt = null;
                return false;
            }
	}
	
	public function modifyData($withInsertId = true){
            try {
                    $this->stmt->execute();
                    $this->numRowsAffected = $this->stmt->rowCount();
                    $this->insertIdentity = $this->lastInsertId();
                    return true;
            }
            catch (PDOException $e){
                    $this->error = $e->getMessage();
                    return false;
            }
	}
	
	
	/*  error/troubleshooting  */
	
	public function getStatement(){
	    return $this->stmt->queryString;
	}
	
}

$db = new Db();
