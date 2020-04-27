<?php 
session_start();
	include './includes/title.php';
?>	
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NBA<?php if(isset($title)) {echo "&mdash;$title";} ?></title>
    <link href="styles/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>