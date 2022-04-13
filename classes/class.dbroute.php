<?php
class Dbroute extends Database {

    public function __construct()
	{	   
	}
	
    public function SelectAll()
    {
		$db = Database::getInstance();
		$mysqli = $db->getConnection(); 		
		$sql_query = "SELECT * FROM `test_comms` ORDER BY id DESC LIMIT 100";
		return  $mysqli->query($sql_query);		
    }
	
	public function SendComm()
	{	
		$db = Database::getInstance();
		$mysqli = $db->getConnection(); 
		$text = strip_tags(substr($_POST['text'], 0, 250));
		$name = strip_tags(substr($_POST['name'], 0, 30));
		$email = substr($_POST['email'], 0, 100);
		$email = str_replace(array("\"", "'"), "", $email);
		$email = str_replace("<", "[", $email);
		$email = str_replace(">", "]", $email);
		if (!empty($text)) {
			 if ($stmt = $mysqli->prepare("INSERT INTO `test_comms` (comments,names,emails) VALUES (?, ?, ?)")  ) {
			 $stmt->bind_param("sss", $text, $name, $email); 
			 $stmt->execute();
				if($stmt->errno)
				{
					return $stmt->error;
				}
				else
				{
					return $stmt->insert_id;  // "inserted successfully"
				}			
				$stmt->close();
			}
			$mysqli->close();
		}
	}	

}
?>