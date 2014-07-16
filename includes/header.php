<?php
require_once 'mysqli_connect.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/main.css">
        <?php foreach($css as $value) {
            echo'<link rel="stylesheet" href="css/'.$value.'.css">';
        } ?>
        <title></title>
    </head>
    <body>
        <div class="wrapper">
            <header class="mainHead">
                <h1>Dojo of the Void</h1>
                <nav class="mainNav">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Cards</a></li>
                        <li><a href="#">Decks</a></li>
                    </ul>
            </nav>
            </header>
            
            <div class="content">