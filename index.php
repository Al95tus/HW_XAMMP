<?php
session_start();

$_SESSION['message'] = 'Hello from index file!';
// Раскомментируйте, чтобы поместить в массив SESSION это сообщение.


$app = 'users';
$view = 'index';
$dbPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pdo' . DIRECTORY_SEPARATOR;
require_once $dbPath . 'db.php';

$apps = array('users');
$views = array('create', 'update', 'delete', 'show', 'list', 'index');

if (isset($_GET['app']) && in_array($_GET['app'], $apps)) {
  $app = $_GET['app'];
} else {
  header('Location: /?app=users&view=index');
}

if (isset($_GET['view']) && in_array($_GET['view'], $views)) {
  $view = $_GET['view'];
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/sakura.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>PHP DB | <?= strtoupper($app) . '::' . ucfirst(strtolower($view)) ?></title>
  </head>

  <body>

    <nav class="nav">
      <ul class="nav__list">

        <li class="nav__item <?= $app === 'users' ? 'active' : '' ?>">
          <a href="?app=users&view=index" class="nav__link">Users</a>
        </li>
        <li class="nav__item <?= $app === 'example' ? 'active' : '' ?>">
          <a href="#" class="nav__link">Example</a>
        </li>

      </ul>
    </nav>

    <div class="container">
      <h1>PHP CRUD</h1>

      <nav class="nav">
        <ul class="nav__list">

          <li class="nav__item--crud">
            <a href="?app=<?= $app ?>&view=list" class="nav__link--crud">List</a>
          </li>

          <li class="nav__item--crud">
            <a href="?app=<?= $app ?>&view=create" class="nav__link--crud">Create</a>
          </li>

        </ul>
      </nav>

      <?php
      if (in_array($view, $views)) {
        $path = $app . DIRECTORY_SEPARATOR . $view . '.php';
        include_once  $path;
      } 
      ?>

    </div>
  </body>

</html>