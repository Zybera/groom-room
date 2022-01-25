<?
require_once ('connect.php');
$type = $_POST['type'];


switch($type) {
  case "LOGIN_USER":
    echo json_encode(authorization($conn, $_POST['login'], $_POST['password']));
    break;
  case "REGISTR_USER":
    echo json_encode(register($conn, $_POST['login'], $_POST['password']));
    break;
  case "CHECK_USER":
    echo json_encode(check($conn, $_POST['login']));
    break;
  default:
    echo 'eror';
    break;
}
function register($conn, $login, $password) {
  $sql = "INSERT INTO `users` (`login`, `password`, `role`) VALUES ('$login', '$password', 'guest')";
  if ($conn->query($sql) === TRUE) {
    return "guest";
  } else {
    return 'Invalid data';
  }
}

function authorization($conn, $login, $password) {
  $users =  mysqli_query($conn, "SELECT * FROM `users`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($users)) {
    array_push($vars, [$var['login'], $var['password'], $var['role']]);
  }
  $result = '';
  for ($i=0; $i < count($vars); $i++) {
    if ($login === $vars[$i][0] && $password === $vars[$i][1]) {
      return $vars[$i][2];
    }
  }
  return 'Invalid data';
}

function check($conn, $login){
  $users =  mysqli_query($conn, "SELECT * FROM `users`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($users)) {
    array_push($vars, [$var['login'], $var['role']]);
  }
  for ($i=0; $i < count($vars); $i++) {
    if ($login === $vars[$i][0]) {
      return $vars[$i][1];
      break;
    }
  }
}
?>