<?php 
$email = $_GET['usernam'];
$pwd =  $_GET['passward'];


// start a connection to the DB
 try {
    $hostname = "localhost";
    $port = 80.443;
    $dbname = "ucd";
    $username = "root";
    $pw = "";
    $dbh = new PDO ("mysql:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }


//Connection granted


  $stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute(array($email));

  $correctUser = null;
  while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($user['pwd']==$pwd) {
    	$correctUser= $user;
    	break;
    }
  }

  if ($correctUser == null) {
    http_response_code(401);
  	echo "password or email inccorect";
  }else{
  	echo json_encode($correctUser);
  }
  unset($dbh); unset($stmt);


 ?>