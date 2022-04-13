<?php
/*
* Mysql database class for only one connection alowed
*
* base variables of configuration:
 define('DB_HOST', '');   
 define('DB_USER', '');  
 define('DB_PASSWORD', '');  
 define('DB_NAME', '');   
 define('DB_CHARSET', 'utf8'); 
*/

class Database {
	private $_connection;
	private static $_instance; //The single instance
 
	private $_host = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASSWORD;
	private $_database = DB_NAME;
	private $_charset = DB_CHARSET;

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
					if (!$this->_connection->set_charset($this->_charset)) {
					printf("Error loading character set utf8: %s\n", $this->_connection->error);
					} else {
					// printf("Current character set: %s\n", $this->_connection->character_set_name());
					$this->_connection->character_set_name();
					} 
        // error
        if ($this->_connection->connect_error)
        {
            trigger_error("Connection Error: " . $this->_connection->connect_error(), E_USER_ERROR);
        }
    }

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

// @usage:

    // $db = Database::getInstance();
    // $mysqli = $db->getConnection(); 
    // $sql_query = "SELECT foo FROM .....";
    // $result = $mysqli->query($sql_query);
	
	
/*
-- Table structure example:
CREATE TABLE IF NOT EXISTS `test_comms` (
  `id` bigint(20) NOT NULL  AUTO_INCREMENT,
  `comments` varchar(256) NOT NULL,
  `names` varchar(32) NOT NULL,
  `emails` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; 
*/
?>