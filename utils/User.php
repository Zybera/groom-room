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
  default:
    echo 'eror';
    break;
}
function register($conn, $login, $password) {
  $sql = "INSERT INTO `users` (`login`, `password`, `role`) VALUES ('$login', '$password', 'guest')";
  if ($conn->query($sql) === TRUE) {
    return "New user created successfully";
  } else {
    return 'Invalid data';
  }
}

function authorization($conn, $login, $password) {
  $users =  mysqli_query($conn, "SELECT * FROM `users`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($users)) {
    array_push($vars, [$var['login'], $var['password']]);
  }
  $result = '';
  for ($i=0; $i < count($vars); $i++) {
    if ($login === $vars[$i][0] && $password === $vars[$i][1]) {
      $result = 'succses';
      break;
    }
  }
  if ($result === 'succses') {
    return "login and password are correct!";
  } else {
    return 'Invalid data';
  }
}
?>