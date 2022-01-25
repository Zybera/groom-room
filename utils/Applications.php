<?
require_once ('connect.php');
$type = $_POST['type'];

switch($type) {
  case "GET_APPLICATIONS":
    echo json_encode(getAllApplications($conn));
    break;
  case "ADD_APPLICATIONS":
    echo json_encode(addApplication($conn, $_POST['name'], $_POST['category']));
    break;
  case "REMOVE_APPLICATIONS":
    echo json_encode(removeApplicationById($conn, $_POST['id']));
    break;
  default:
    echo 'eror';
    break;
}

function addApplication($conn, $name, $category) {
  $date = date('Y-m-d');
  $sql = "INSERT INTO `applications` (`id`, `name`, `img-before`, `img-after`, `timestamp`, `category`, `status`) VALUES (NULL, '$name', 'public/img/dog.png', 'public/img/dogAfter.png', '$date', '$category', 'Обработка')";
  if ($conn->query($sql) === TRUE) {
    $applications =  mysqli_query($conn, "SELECT * FROM `applications` where `name` = '$name'");
    $vars = [];
    while ($var = mysqli_fetch_assoc($applications)) {
      array_push($vars, array('id' => $var['id'], 'img' => $var['img-before'],'name' => $var['name'],'category' => $var['category'],'status' => $var['status'],'timestamp' => $var['timestamp']));
    }
    return $vars;
  } else {
    return "Error: " . $sql . "<br>" . $conn->error;
  }
}

function getAllApplications($conn) {
  $applications =  mysqli_query($conn, "SELECT * FROM `applications`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($applications)) {
    array_push($vars, array('id' => $var['id'], 'img' => $var['img-before'],'imgAfter' => $var['img-after'],'name' => $var['name'],'category' => $var['category'],'status' => $var['status'],'timestamp' => $var['timestamp']));
  }
  return $vars;
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

function removeApplicationById($conn, $id) {
  $sql = "DELETE FROM `applications` WHERE `applications`.`id` = '$id'";
  if ($conn->query($sql) === TRUE) {
    return "Application was remove successfull";
  } else {
    return"Error: " . $sql . "<br>" . $conn->error;
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