<?php
  mysql_connect("oege.ie.hva.nl","reinded003","qS9Fu8G8Oo2BBA");
  mysql_select_db("zreinded003");
  
 
  $checkedVal=$_POST["checkedVal"];
  $checkedId=$_POST["checkedId"];

  $query=mysql_query("INSERT INTO scoreList (users_email, badges_idbadges, done) VALUES ('thelegendxxx420@gmail.com', $checkedId, $checkedVal)ON DUPLICATE KEY UPDATE done=$checkedVal;");
 
  if($query){
    echo "&#10003;";
  }
  else{
    echo "&#10060;";
  }
?>