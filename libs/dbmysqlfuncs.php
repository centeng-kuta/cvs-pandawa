<?php
include 'dbconfig.php';

function db_connect() {
    $rs = mysql_connect(DBHOST,DBUSER,DBPASSWORD);
    mysql_select_db(DBNAME,$rs);
}

function fetchData($tablename, $fields = "*", $conditions = "", $opts = "") {
    $queryString = "";

    if ($fields == "*") {
        $queryString .= "SELECT * FROM ".$tablename;
    } else {
        $queryString .= "SELECT ".trim($fields)." FROM ".$tablename;
    }
    
    if ($conditions != "") {
        $condList = explode(",",$conditions);
        $queryString .= " WHERE ".$condList[0]." ";

        /* check if condition more than one */
        if (count($condList) > 1) {
            unset($condList[0]);
            $nextCondList = "";

            /* just concat next conditions then concat with $queryString */
            foreach($condList as $nextCond) {
                $nextCondList .= "AND ".$nextCond." ";
            }
            $queryString .= $nextCondList;
        }
    }

    if ($opts != "") {
        $queryString .= " ".$opts;
    }
	
    $queryString .= " LIMIT 1";

    $data = query($queryString);

    return $data[0];
}

function fetchDataAll($tablename, $fields = "*", $conditions = "", $opts = "") {
    $queryString = "";

    if ($fields == "*") {
        $queryString .= "SELECT * FROM ".$tablename;
    } else {
        $queryString .= "SELECT ".trim($fields)." FROM ".$tablename;
    }

    if ($conditions != "") {
        $condList = explode(",",$conditions);
        $queryString .= " WHERE ".$condList[0]." ";

        /* check if condition more than one */

        if (count($condList) > 1) {
            unset($condList[0]);
            $nextCondList = "";
            
            /* just concat next conditions then concat with $queryString */
            foreach($condList as $nextCond) {
                $nextCondList .= "AND ".$nextCond." ";
            }
			
            $queryString .= $nextCondList;
        }
    }

    if ($opts != "") {
		$queryString .= " ".$opts;
    }

    $data = query($queryString);

    return $data;
}

function findCount($tablename,$conditions = "") {
  $queryString = "SELECT COUNT(*) AS datacount FROM ".$tablename;

  if ($conditions != "") {
      $condList = explode(",",$conditions);
      $queryString .= " WHERE ".$condList[0]." ";

      /* check if condition more than one */

      if (count($condList) > 1) {
          unset($condList[0]);
          $nextCondList = "";
          
          /* just concat next conditions then concat with $queryString */
          foreach($condList as $nextCond) {
              $nextCondList .= "AND ".$nextCond." ";
          }
          
          $queryString .= $nextCondList;
      }
  }
  
  db_connect();
  $query = mysql_query($queryString) or die(mysql_error());
  $fetch = mysql_fetch_array($query,MYSQLI_ASSOC);
  
  mysql_free_result($query);
  
  return $fetch['datacount'];
}

function query($queryString) {
    $data = array();
    db_connect();
    
    $query = mysql_query($queryString) or die(mysql_error());
    
    if (mysql_num_rows($query) >= 1) {
    	while ($result = mysql_fetch_array($query,MYSQL_ASSOC)) {
    		array_push($data,$result);
    	}
    	mysql_free_result($query);
    }
    
    return $data;
}
//FUNGSI UNTUK INPUT DATA
function  insert($info, $table) {
   if (!is_array($info)) { die("Sukses"); } 
      $sql = "INSERT INTO ".$table." ("; 
      for ($i=0; $i<count($info); $i++) { 
     $sql .= key($info); 
     if ($i < (count($info)-1)) { 
        $sql .= ", "; 
     } else $sql .= ") "; 
        next($info); 
     } 
    
     reset($info); 
     $sql .= "VALUES ("; 
     for ($j=0; $j<count($info); $j++) { 
        $sql .= "'".current($info)."'"; 
        if ($j < (count($info)-1)) { 
           $sql .= ", "; 
        } else $sql .= ") "; 
        next($info); 
     } 

     mysql_query($sql) or die("Ada kesalahan pada query ".mysql_error()); 
         return mysql_insert_id(); 
      }