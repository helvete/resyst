<?php
$time = -microtime(true);
include "./config.php";
include "./pdo_connect.php";
include './post.php';
include './posts.php';
include './tag.php';
include "./publicController.php";
include "./statLib.php";
include "./view.php";

$ctrller = new PublicController();

View::addHeadLine('<title>R2</title>');
View::printPageStart();

$login = AuthLib::getLoggedUser();
$displayName = AuthLib::getDisplayNameByLogin($login);
echo $displayName
	? "<div class=\"userAction\">Logged as <b>$displayName</b> &nbsp; "
	: '';
AuthLib::getAction();
echo '</div>';

$ctrller->printHtml();

$time += microtime(true);
echo '<div class="stats">Memory used: ' . memory_get_usage(true)/1024
	. "kiB | Time consumed: {$time}s </div>";

View::printPageEnd();
