<?
	/*
	Database connection function
	Database User ID = 20141043
	Database User PW = 123456
	Database Name = 20141043
	*/
	function dbconn(){
		$host_name="localhost";
		$db_user_id="20141043";
		$db_name="20141043";
		$db_pw="123456";
		$connect=mysql_connect($host_name, $db_user_id, $db_pw);
		
		mysql_query("set names utf8", $connect);
		mysql_select_db($db_name, $connect);
		if(!$connect)die("Connection Failed." .mysql_error());
		
		return $connect;
	}

	/*
	Print out error message
	*/
	function Error($msg){
		echo "
		<script>
		window.alert('$msg');
		history.back(1);
		</script>";
		exit;
	}
	
	/*
	Cookie
	*/
	function member(){
		global $connect;
		$temps=$_COOKIE["COOKIES"];
		$cookies=explode("//", $temps);

		$query="select * from member where user_id='$cookies[0]'";
		mysql_query("set names utf8", $connect);
		$result = mysql_query($query, $connect);
		$member = mysql_fetch_array($result);
		return $member;
	}

	function mq($sql){
		global $db;
		return $db->query($sql);
	}
?>