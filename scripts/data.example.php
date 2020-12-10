<?php
	class Database{
		public $hostname = '****';
		public $username = '****';
		public $password = '****';
		public $database = '****';

		public function connect(){
			global $mysql;
			$mysql = new mysqli($this->hostname, $this->username, $this->password, $this->database);
			return $mysql;
		}
	}

	function getPunctList(){
		$mysql = (new Database())->connect();
		$mysql->set_charset("utf8");
		$puncts = $mysql->query("SELECT field1, id, field2 AS open FROM table", MYSQLI_USE_RESULT);
		$p = $puncts->fetch_all(MYSQLI_ASSOC);
		$names = [0, 2, 3, 7];
		for ($i = 0; $i < count($names); $i++) { 
			$key = array_search($names[$i], array_column($p, 'field1'));
			//echo($key." - ".$names[$i]);
			//echo "<br>";
			unset($p[$names[$i]]);
		}
		//echo("<br>");
		echo (json_encode($p, JSON_UNESCAPED_UNICODE));
	}

	function getPunctCurrency($id){
		$mysql = (new Database())->connect();
		$mysql->set_charset("utf8");
		$p = $mysql->query("SELECT * FROM table WHERE id = ".$id, MYSQLI_USE_RESULT);
		$p = $p->fetch_all(MYSQLI_ASSOC);

		$puncts = array(
			array('name' => 'UAH', 'buy' => '', 'sell' => '', 'count' => $p[0]['sUH']),
			array('name' => 'USD', 'buy' => $p[0]['uB'], 'sell' => $p[0]['uA'], 'count' => $p[0]['sU']),
			array('name' => 'EUR', 'buy' => $p[0]['eB'], 'sell' => $p[0]['eA'], 'count' => $p[0]['sE']),
			array('name' => 'PLN', 'buy' => $p[0]['pB'], 'sell' => $p[0]['pA'], 'count' => $p[0]['sP']),
			array('name' => 'RUB', 'buy' => $p[0]['rB'], 'sell' => $p[0]['rA'], 'count' => $p[0]['sR']),
			array('name' => 'BYR', 'buy' => $p[0]['fB'], 'sell' => $p[0]['fA'], 'count' => $p[0]['sF']),
		);
		echo json_encode($puncts, JSON_UNESCAPED_UNICODE);
	}

	function getPunctDataOutcome($id){
		$mysql = (new Database())->connect();
		$mysql->set_charset("utf8");
		$values = [NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN];
		$date = date("01.m.Y");
		for ($i=0; $i <= 30 ; $i++) { 
			$data = $mysql->query("SELECT SUM(field1), field2 FROM table WHERE field3 = ".$id." AND field2 = '".$date."' AND field4 = 'UAH'", MYSQLI_USE_RESULT);
			$d = $data->fetch_all(MYSQLI_ASSOC);
			$values[intval($d[0]["field2"][0].$d[0]["field2"][1])-1] = intval($d[0]["SUM(field1)"]);
			//echo $d[0]["SUM(sumMINUS)"];
			$date = date("d.m.Y", strtotime($date."+1 day"));
		}	
		echo (json_encode(array_values($values), JSON_UNESCAPED_UNICODE));
		
	}

	function getPunctDataIncome($id){
		$mysql = (new Database())->connect();
		$mysql->set_charset("utf8");
		$values = [NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN];
		$date = date("01.m.Y");
		for ($i=0; $i <= 30 ; $i++) { 
			$data = $mysql->query("SELECT SUM(field1), field2 FROM table WHERE field3 = ".$id." AND field2 = '".$date."' AND field4 = 'UAH'", MYSQLI_USE_RESULT);
			$d = $data->fetch_all(MYSQLI_ASSOC);
			$values[intval($d[0]["field2"][0].$d[0]["field2"][1])-1] = intval($d[0]["SUM(field1)"]);
			//echo $d[0]["SUM(sumMINUS)"];
			$date = date("d.m.Y", strtotime($date."+1 day"));
		}	
		echo (json_encode(array_values($values), JSON_UNESCAPED_UNICODE));

	}

	if($_GET["type"] == "punct_list")
	{
		getPunctList();
	}
	else if($_GET["type"] == "punct_currency")
	{
		getPunctCurrency($_GET["value"]);
	}
	else if($_GET["type"] == "punct_data_outcome")
	{
		getPunctDataOutcome($_GET["value"]);
	}
	else if($_GET["type"] == "punct_data_income")
	{
		getPunctDataIncome($_GET["value"]);
	}

	// function getPunctDataPrev($id){
	// 	$mysql = (new Database())->connect();
	// 	$mysql->set_charset("utf8");
	// 	$data = $mysql->query("SELECT uah, dat FROM savsum WHERE punkt = ".$id." AND ntim BETWEEN '".date('Y-m-01', strtotime('now -1 month'))."' AND '".date('Y-m-31', strtotime('now -1 month'))."'", MYSQLI_USE_RESULT);
	// 	$values = [NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN];
	// 	foreach ($data as $d) {
	// 		$values[intval($d["dat"][0].$d["dat"][1])-1] = $d["uah"];
	// 	}
	// 	echo (json_encode($values, JSON_UNESCAPED_UNICODE));
	// }
?>