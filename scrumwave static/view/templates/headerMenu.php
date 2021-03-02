<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>scrumwave</title>
  <script src="https://kit.fontawesome.com/66499e4192.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<style>
		
    /** scrollbar styling */

    body::-webkit-scrollbar{
    	width:0.6rem;
    }

    body::-webkit-scrollbar-track{
    	background: #ffffff;
    	-webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.3); 
    }

    body::-webkit-scrollbar-thumb{
    	background:#15538c;
    	border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.5);
    }

    #Scrumwave{
      position:absolute;
      top:10px;
      left:50%;
      transform:translate(-50%);
      z-index:20;
    }
	</style>
  <img id="Scrumwave" src="<?= URL ?>public/img/Logo.png" width="250px" height="100px">