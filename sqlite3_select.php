<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('first.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Start==/.Opened database successfully\n<br/>";
	  echo "=====================================\n<br/><br/>";
   }

   $sql =<<<EOF
      SELECT * from COMPANY;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "ID=". $row['ID'] . "\n";
      echo "NAME=". $row['NAME'] ."\n";
      echo "ADDRESS=". $row['ADDRESS'] ."\n";
      echo "SALARY=".$row['SALARY'] ."\n\n<br/><br/>";
   }
   
   echo "=====================================\n<br/>";
   echo "End==/.Operation done successfully\n<br/>";
   $db->close();
?>