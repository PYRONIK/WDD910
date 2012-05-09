<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', TRUE);


require('class/class.user.php');

$user = new User();

?>

<html>

<h1>class.user.php</h1>


<?php

if($user->getUserGroup() === 'admin'){
echo "<h1>Administration</h1>";
}

?>


<?php if(!$user->getUserGroup()){ ?>

<h2>Login</h2>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

	<input type="text" value="username" name="username" />
	<input type="password" value="password" name="password" />

	<input type="submit" />
</form>

<?php }else { ?>



<h2>Logout</h2>
<a href="<?= $_SERVER['PHP_SELF'] ?>?logout">logoutbutton</a>

<?php } ?>

<h2>Username</h2>
<?php var_dump($user->getUsername()); ?>


<h2>Group</h2>
<?php var_dump($user->getUserGroup()); ?>

</html>






