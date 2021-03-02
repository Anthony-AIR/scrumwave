<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>scrumwave</title>
	<script src="https://kit.fontawesome.com/66499e4192.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
</head>
<body class="text-center">
	<style>

		/** scrollbar styling */

		body::-webkit-scrollbar{
			width:0.6rem;
		}

		body::-webkit-scrollbar-track{
			background:#1e1e24;
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
    	}
	</style>
  	<img id="Scrumwave" src="<?= URL ?>public/img/Logo.png" width="250px" height="100px">
