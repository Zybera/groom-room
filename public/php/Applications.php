<?
require_once ('connect.php');

echo '<br>';

function addApplication($conn, $name, $category) {
  $date = date('Y-m-d');
  $sql = "INSERT INTO `applications` (`id`, `name`, `img-before`, `img-after`, `timestamp`, `category`, `status`) VALUES (NULL, '$name', '1', '1', '$date', '$category', 'new')";
  if ($conn->query($sql) === TRUE) {
    echo "New application created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function getAllApplications($conn) {
  $applications =  mysqli_query($conn, "SELECT * FROM `applications`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($applications)) {
    array_push($vars, [$var['id'], $var['name'], $var['img-before'], $var['img-after'], $var['timestamp'], $var['category'], $var['status']]);
  }
  for ($i=0; $i < count($vars); $i++) {
    for ($j=0; $j < count($vars[$i]); $j++) { 
      echo $vars[$i][$j]. " ";
    }
    echo '<br>';
  }
}

function getApplicationsById($conn, $id) {
  for ($idx=0; $idx < count($id); $idx++) { 
    $applications =  mysqli_query($conn, "SELECT * FROM `applications` Where `id` = '$id[$idx]'");
    $vars = [];
    while ($var = mysqli_fetch_assoc($applications)) {
      array_push($vars, [$var['id'], $var['name'], $var['img-before'], $var['img-after'], $var['timestamp'], $var['category'], $var['status']]);
    }
    for ($i=0; $i < count($vars); $i++) {
      for ($j=0; $j < count($vars[$i]); $j++) { 
        echo $vars[$i][$j]. " ";
      }
      echo '<br>';
    }
  }
}

function removeApplicationByName($conn, $name) {
  $sql = "DELETE FROM `applications` WHERE `applications`.`name` = '$name'";
  if ($conn->query($sql) === TRUE) {
    echo "Application was remove successfull";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function changeStatusApplicationByName($conn, $name, $status) {
  $sql = "UPDATE `applications` SET `status` = '$status' WHERE `name` = '$name'";
  if ($conn->query($sql) === TRUE) {
    echo "Status was changed successfull";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>