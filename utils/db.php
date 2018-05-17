
<?php

class dataBase
{

	private $conn;
	function makeConnection()
	{
		$server = "localhost";
		$user = "root";
		$dbName = "school";
		$this->conn = new mysqli($server, $user, "", $dbName);
		if ($this->conn->connect_error)
		{
			error_log("Failed to connect to database!", 0);
		}
	}
	function query($sql)
	{
		$result = $this->conn->query($sql);
		if ($result)
		{
			return $result;
		} 
		else
		{
			
			error_log($sql . "<br> " . $this->conn->error, 0);
		}
	}

	function close()
	{
		$this->conn->close();
	}

}

?>