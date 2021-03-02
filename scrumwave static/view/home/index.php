<style>
table {
    position:absolute;
    left:50%;
    top:320px;
    transform:translate(-50%);
    
}
table, th, td {
    border: 3px solid;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}

#delete{
    position:absolute;
    left:69%;
    color:crimson;
}

#update{
    position:absolute;
    left:47%;
    color: #0095d5;
}

#done{
    position:absolute;
    left:90%;
    color:green;
}

#dropdown{
    position:absolute;
    left: 12%;
    top: 105px;
    background-color: #15538c;
    color:white;
}

table, p{
    color:black;
}

body{
    background-image: ("home/img/Logo.png");
}

#overview{
    position: absolute;
    right: 12%;
    top: 420px;
    color: #15538c;
    font-size: 2rem;
}

body{
   margin-top:120px;
}

</style>

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<h1>Welkom bij Scrumwave!</h1>
<br>
<br>
<h2>Maak hier een bord aan, pas het bord aan of verwijder hem.</h2>
<br><br>
    
<table id="tabel" style="width:700px;">
  <tr style="color: #15538c;">
    <th><p class="text-center">Project names</p></th>

  </tr>
  <?php foreach ($projects as $project){ ?>
    <tr style="color: #15538c;">
        <td><a href="<?php echo URL ?>Home/oneProject/<?php echo $project["Id"]?>"><p class="text-center"><?php echo $project["Name"]?></p></a></td>
    </tr>
  <?php } ?>
</table>

<?php 
$doneProject = doneProjects();
?>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown">Done
  <span class="caret"></span></button>
  <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
  <?php foreach($doneProject as $Done){?>
    <li role="presentation"><a href="<?php echo URL ?>Home/oneProject/<?php echo $Done["Id"];?>" role="menuitem"><?php echo $Done["Name"]?></a></li><br>
  <?php } ?>
  </ul>
    <br><br><br><br>
</div>
<a id="overview" href="<?php echo URL ?>projects/index"><i class="fas fa-tasks"></i></a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
