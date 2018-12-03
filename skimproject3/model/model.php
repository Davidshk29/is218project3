<?php

require'connection.php';

class Model {


 public function getlogin()
 {
  // here goes some hardcoded values to simulate the database
  if(isset($_REQUEST['submit'])){

  	$email=$_REQUEST['email'];
  	$password=$_REQUEST['password'];
    $id=$_GET['id'];
  
     $conn= Db::getInstance();


$stmt = $conn->prepare("SELECT fname,lname FROM todos WHERE ? = email");
     $params = array($email);
     $stmt->execute($params);

$stmt1 = $conn->prepare("SELECT fname,lname FROM todos WHERE ? = password");
     $params1 = array($password);
     $stmt1->execute($params1);

$stmt2 = $conn->prepare("SELECT fname,lname FROM todos WHERE ? = email AND ? = password");
     $params2 = array($email,$password);
     $stmt2->execute($params2);

$stmt3 = $conn->prepare("SELECT * FROM todos WHERE ? = email");
     $params3 = array($email);
     $stmt3->execute($params3);



       if ($stmt->rowCount() == 0) 
        {
       
      return'log1';
      
    }
    
    elseif ($stmt1->rowCount() == 0) 
        {
      return 'log2';
      }             

     elseif  ($stmt2->rowCount() > 0){
               $users = $stmt2->fetchAll();
          foreach ($users as $user) {
    
    echo "<p>Welcome back!</p>";
    echo "<p>".$user['fname'] .' '.$user['lname']."</p>";




    if($stmt3->rowCount($id) > 0){
  echo "<table border=\"4
  \" ><tr><th>ID</th><th>email</th><th>Date Create</th><th>Question</th><th>Answer</th><th>Skills</th><th>action1</th><th>action2</th></tr>";

$count = 0;
echo $counter; 
$count++;

while($row = $stmt3->fetch(PDO::FETCH_BOTH)){
echo "<tr>";
echo '<td>' . $row['id'] . '</td>';
echo '<td>' . $row['email'] . '</td>';
echo '<td>' . $row['duedate'] . '</td>';
echo '<td>' . $row['message'] . '</td>';
echo '<td>' . $row['messagea'] . '</td>';
echo '<td>' . $row['messageb'] . '</td>';
echo '<td><a href="update.php?id=' . $row['id']. '">Edit</a></td>';
echo '<td><a href="delete.php?id=' . $row['id'].'">Delete</a></td>';
echo "</tr>";
echo "</table>";
}
}

echo "<p><a href='add.php'>Add a new record</a></p>";
    }


}
 return 'log3';
}


elseif(isset($_POST['create'])){
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$message=$_POST['message'];
$messagea=$_POST['messagea'];
$messageb=$_POST['messageb'];
$duedate= $_POST['duedate'];
$message1="<p align='center'> <font color=green size=50px >Sorry, E-mail address is already being used</p>";
$message2=" <p align='center'> <font color=green size=50px >You have sucessfully signed up<p>";
$conn= Db::getInstance();
    
  $stmt = $conn->prepare("SELECT email FROM todos WHERE ? = email");
     $params = array($owneremail);
     $stmt->execute($params);
     if ($stmt->rowCount() > 0) 
        {
          echo $message1;
      
      
        } 
     $sql = "INSERT INTO todos (fname, lname, password, email, duedate, message, messagea, messageb)VALUES ('".$fname."','".$lname."','".$password."','".$email."','".$duedate."','".$message."','".$messagea."','".$messageb."')";
          $conn->exec($sql);
       echo $message2;
       return 'log3';
  }
  elseif(isset($_POST['delete'])){
    $id = $_GET['id'];
    $conn= Db::getInstance();
    echo $id;

     $stmt4 = $conn->prepare("DELETE FROM todos  WHERE ? = id");
     $params4 = array($id);
     $stmt4->execute($params4);




    echo "<font color='green'>Data deleted successfully.";

  return 'log4';




  }

    elseif(isset($_POST['update'])){
    $message=$_POST['message'];
	$messagea=$_POST['messagea'];
	$messageb=$_POST['messageb'];
    $owneremail= $_POST['email'];
    $id=$_POST['id'];

    $conn= Db::getInstance();
    $sql ="update todos set message = '$message', email='$email' where id = '$id' ";
	$sql ="update todos set messagea = '$messagea', email='$email' where id = '$id' ";
	$sql ="update todos set messageb = '$messageb', email='$email' where id = '$id' ";
$results = runQuery($sql);
    // echo a message to say the UPDATE succeeded
    echo $results->rowCount() . " records UPDATED successfully";
    
  return 'log4';



    }

else{
    return 'invalid user';
   }
 
}

}

?>
