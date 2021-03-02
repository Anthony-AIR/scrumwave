<!-- de code voor de toggle menu -->
<nav class="navbar">
    <a id="toggleMenu"><i class="fas fa-angle-double-up logo"></i></a>
</nav>

<!-- de code voor de navbar, add user button en delete user button -->
<nav  class="navbar-nav">
  <ul class="navbar-nav-flex">
  	<li class="nav-item">
  		<a class="nav-link" href="<?php echo URL?>projects/home">
  			<i class="fas fa-home"></i>
  		</a>
  	</li>
  	<li class="nav-item user-color">
      <div class="navbar-menu">
        <?php foreach( $users as $user ){ ?>
          <span style="margin-left:2vh; color: var(--text-primary);">
            <strong><?php echo $user["Name"] ?></strong>
            <div class="colors"  style="background-color:<?php echo $user["Color"] ?>"></div>
          </span>
        <?php } ?>
        <button type="submit" class="more-users">+</button><!-- add user button -->
        <button type="button" class="less-users">-</button><!-- delete user button -->
    	</div>
    </li>
  </ul>
</nav>

<!-- de code voor de popup delete user -->
<div class="less-form-popup" id="myForm">
  <form method="post" action="<?php echo URL?>projects/delete" class="form-container"> <!-- de echo URL in de action zorgt ervoor dat de URL opnieuw begint en niet achter de al bestaande URL ( dit geld voor alle echo URL's ) -->
    <h1>delete user</h1>
    <label for="color"><b>color</b></label>
    <select name="color" id="formColor" required>
      <option value="" selected>wie wil je delete ?</option>
      <?php foreach( $users as $User ){ ?>
        <option value="<?php echo $User['Id'] ?>" style="background-color:<?php echo $User['Color'] ?>"><?php echo $User["Name"] ?></option>
      <?php } ?>
    </select>
    <button type="submit" class="less-btn">delete</button>
    <button type="reset" class="less-btn less-cancel">cancel</button>
  </form>

  <style>

    /** basic button styling */
    .form-container .less-btn {
      background-color: red;  /** button kleur */
      color: var(--text-primary); /** de text kleur in de button */
      padding: 16px 20px;
      border: none;
      border-radius:5px;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    .form-container .less-cancel {
      background-color: #4CAF50; /** de button kleur voor less-cancel */
    }

  </style>

</div>

<!-- de code voor de popup add user -->
<div class="form-popup" id="myForm">
  <form method="post" action="<?php echo URL?>projects/edit" class="form-container">
    <h1>add user</h1>
    <label for="name"><b>name</b></label>
    <input id="formName" type="text" placeholder="enter name" name="Name" required>
    <label for="color"><b>color</b></label>
    <select name="color" id="formColor" required>
      <?php foreach( $noneUsers as $noneUser ){ ?>
        <option value="<?php echo $noneUser['Id'] ?>" style="background-color:<?php echo $noneUser['Color'] ?>"><?php echo $noneUser["ColorName"] ?></option>
      <?php } ?>
    </select>
    <button type="submit" class="btn">add</button>
    <button type="reset" class="btn cancel more-users">cancel</button>
  </form>

  <style>

    /** basic popup styling */
    .form-popup, .less-form-popup  {
      display: none;
      position: fixed;
      bottom: 5rem;
      right: 1vw;
      border: 3px solid #f1f1f1;
      z-index: 9;
      border-radius:30px 30px 0px 0px;
      background-color: white;
    }

    .form-container {
      max-width: 300px;
      padding: 10px;
    }

    #formName, #formColor{
      width: 70%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /** focus styling form */
    #formName:focus, #formColor:focus {
      background-color: #ddd;
      outline: none;
    }

    /** basic button styling */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      border-radius:5px;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    .form-container .cancel {
      background-color: red;
    }

    /** button hover styling */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }

  </style>

</div>

<!-- script voor delete user popup, add user popup, navbar en toggle menu -->
<script scr="jquery-3.5.1.min.js">

  //onclick toggle color form
  $( ".more-users, .cancel" ).click( function() { 
    if ($(".less-form-popup").is(":visible")) { /** dit zorgt ervoor dat less-form-popup en form-popup niet tegelijk in beeld komen op het moment dat form-popup in beeld moet zijn */
      $( ".less-form-popup" ).slideToggle( 600,"linear" ); /** de 600 staat voor de 600 miliseconde die het duurt tot de popup in of uit het beeld is ( als je dit aanpast moeten alle 600 in deze script stuk mee veranderen. ) */
      setTimeout(function(){
        $( ".form-popup" ).slideToggle( 600,"linear" );
      }, 600);
    }
    else{
      $( ".form-popup" ).slideToggle( 600,"linear" );
    }
  });

  // onclick toggle menu
  $( "#toggleMenu" ).click( function() {
    if ($(".form-popup").is(":visible")) { /** dit zorgt ervoor dat als form-popup visible is dat die eerst uit beeld gaat en daarna pas de rest van het menu */
      $( ".form-popup" ).slideToggle( 600,"linear" );
      setTimeout(function(){
        $( ".navbar-nav" ).slideToggle( 600,"linear" );
        $(".logo").toggleClass("down");
        $(".navbar").toggleClass("menuUp");
      }, 600);
    }

    else if($(".less-form-popup").is(":visible")) {/** dit zorgt ervoor dat als less-form-popup visible is dat die eerst uit beeld gaat en daarna pas de rest van het menu */
      $( ".less-form-popup" ).slideToggle( 600,"linear" );
      setTimeout(function(){
        $( ".navbar-nav" ).slideToggle( 600,"linear" );
        $(".logo").toggleClass("down");
        $(".navbar").toggleClass("menuUp");
      }, 600);
    }

    else{/** dit is voor als er geen popup visible is */
      $( ".navbar-nav" ).slideToggle( 600,"linear" );
      $(".logo").toggleClass("down");
      $(".navbar").toggleClass("menuUp");
    }
  });

  //onclick toggle color form
  $( ".less-users, .less-cancel" ).click( function() {
    if ($(".form-popup").is(":visible")) { /** dit zorgt ervoor dat less-form-popup en form-popup niet tegelijk in beeld komen op het moment dat less-form-popup in beeld moet zijn */
      $( ".form-popup" ).slideToggle( 600,"linear" );
      setTimeout(function(){
        $( ".less-form-popup" ).slideToggle( 600,"linear" );
      }, 600);
    }
    else{
      $( ".less-form-popup" ).slideToggle( 600,"linear" );
    }
  });

</script>

<!-- styling voor menu -->
<style>

    /** site basic styling */ 
    :root{
    	font-size:16px;
    	font-family: "open Sans";
    	--text-primary:#ffffff; /** de kleur voor alle text op donkere achtergronden ( wit ) */
    	--text-secondary:#ececec; /** licht grijs */
    	--bg-primary:#15538c; /** simwave donker blauw */
    	--bg-secondary:#0095d5; /** simwave licht blauw */
      --transition-speed:400ms; /** transition speed voor animaties */
      text-align: center;
    }

    body{
    	color:black;
    	margin:0;
    	padding:0;
    }

    /** navbar basic styling */
    #toggleMenu{
      font-size:3rem;
      left:2rem;
    }

    .navbar {
      position: fixed;
      bottom: 0rem;
      left:1rem;
      background-color: var(--bg-primary);
      width: 5vw;
    	height: 3.5rem;
      border-radius: 15px 15px 0px 0px;
      transition: 600ms;
      transition-timing-function: linear;
      align-items: center;
      z-index: 2;
    }

    .navbar-nav{
      position: fixed;
      bottom: 0px;
      left:0;
      margin:0;
      background-color: var(--bg-primary);
      width: 100vw;
      height: 5rem;
      align-items: center;
      z-index: 3;
      display:none;
      justify-content: space-between;
    }
    
    .navbar-nav-flex{
      list-style: none;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }

    .logo{
      color: var(--bg-secondary);
      transform: rotate(0deg);
      transition: var(--transition-speed);
    }

    .nav-link{
      color: var(--bg-secondary);
      font-size:3rem;
    }

    /** menu down styling and rotation */
    .down{
      transform: rotate(180deg);
    }

    .menuUp{
      position: fixed;
      bottom: 1rem;
      height:7.5rem;
    }

    .navbar-menu{
      margin-right: 5rem;
      width:50vw;
      height:6vh;
      text-align:start;
      display: grid;
      grid-template-rows: repeat(3, 2vh);
      grid-gap:5px;
      grid-auto-flow: column;
    }

    .colors{
      width:1vh;
      height:1vh;
      position:relative;
      top:-1.5vh;
      left:-1.8vh;
      border:solid 1px black;
    }

    .more-users{
      text-decoration: none;
      border: solid 1px gray;
      border-radius:8px;
      width:6vh;
      background-color:#cdc9c9;
      color:black;
    }

    .less-users{
      text-decoration: none;
      border: solid 1px gray;
      border-radius:8px;
      width:6vh;
      background-color:#cdc9c9;
      color:red;
    }

    /** form styling en position */
    .form-container2{
      position: fixed;
      left: 50%;
      top: 50%;
      transform:translate(-50%,-50%);
      height:435px;
      width:590px;
      border: 2px solid black;
      border-radius:12px;
      background-color: var(--bg-primary);
      z-index:9;
    }

    .form-container2 input[type=text]{
      margin-top:15px;
      width:300px;
      height:50px;
      border: none;
      background: white;
    }

    .form-container2 input[name=description]{
      margin-top:15px;
      width:300px;
      height:100px;
      border: none;
      background: white;
    }

    #myTask{
      display:none;
    }

    .TaskForm{
      display:none;
    }

    .projectForm{
      display:none;
    }

</style>

<!-- de code voor de tabel, tasks en dragndrop -->
<table>

  <!-- de 1ste row in de table met alle kolom namen erin -->
  <tr>
    <td class="td"><h2>projects</h2></td>
    <td class="td"><h2>back log<h2></td>
    <td class="td"><h2>to do<h2></td>
    <td class="td"><h2>in progress</h2></td>
    <td class="td"><h2>evaluate</h2></td>
    <td class="td"><h2>done</h2></td>
  </tr>
  
  <!-- dit is de code voor een project en inhoud -->
  <?php foreach ($projects as $project){ ?> <!-- voor ieder project in de database word dit 1 keer uitgeprint -->
    <tr style="background-color:<?php echo $project["Color"]?>; height:200px;">
        
      <!-- de eerste kolom van deze row -->
      <td class="projectName" ><strong><?php echo $project["Name"]?></strong><br>
        <button class="project_btn" id="project_btn<?php echo $project["Id"]?>" type="button" ><i class="fas fa-pen"></i></button> <!-- button om deze project aan te passen ( project name, project description, project color ) -->

        <!-- de code voor de projectForm -->
        <div class="projectForm" id="projectForm<?php echo $project["Id"]?>" name="projectForm">
          <form name="projectForm" method="post" action="<?php echo URL ?>Projects/updateProjectsOneProject/<?php echo $project["Id"] ?>" class="form-container2"><br><br>
                  
            <!-- normale input voor name en discription -->
            <input type="text" placeholder="project Name:" name="Name" value="<?php echo $project["Name"]?>" required><br><br>
            <input type="text" placeholder="project description:" name="description" value="<?php echo $project["description"]?>"><br><br>

            <!-- deze select kijkt welke kleur er momenteel voor de project word gebruikt en geeft daar een gepaste select voor -->
            <select style="width:140px; height:30px;" name="Color" required>
              
              <?php if($project["Color"] == "red"){?>
                <option style="background-color:red;" value="<?php echo $project["Color"]?>" selected>Important</option>
                <option style="background-color:yellow;" value="yellow">On Hold</option>
                <option style="background-color:#ffffff;" value="white">Standard</option>
              <?php } 

              else if($project["Color"] == "yellow"){?>
                <option style="background-color:yellow;" value="<?php echo $project["Color"]?>" selected>On Hold</option>
                <option style="background-color:red;" value="red">Important</option>
                <option style="background-color:#ffffff;" value="white">Standard</option>
              <?php } 
              
              else if($project["Color"] == "white"){?>
                <option style="background-color:#ffffff;" value="<?php echo $project["Color"]?>" selected>Standard</option>
                <option style="background-color:red;" value="red">Important</option>
                <option style="background-color:yellow;" value="yellow">On Hold</option>
              <?php } ?>

            </select><br>

            <button style="margin-top:80px;" type="button" id="closeProjectTab<?php echo $project["Id"]?>">Close project</button><!-- button om projectForm invisible te maken -->
            <button type="submit" value="submit">save project</button>
                
          </form>
        </div>

        <!-- de script voor de projectForm -->
        <script scr="jquery-3.5.1.min.js">

          /** script om projectForm invisible of visible te maken */
          $( "#project_btn<?php echo $project["Id"]?>" ).click( function() {
              
            if ($(".projectForm").is(":visible")) {
              for(i = 0; i < document.getElementsByClassName("projectForm").length; i++) {
                document.getElementsByClassName("projectForm")[i].style.display = "none";
              }
            }

            else{
              if ($(".myTask").is(":visible")) {
                for(i = 0; i < document.getElementsByClassName("myTask").length; i++) {
                  document.getElementsByClassName("myTask")[i].style.display = "none";
                }
              }

              if ($(".TaskForm").is(":visible")) {
                for(i = 0; i < document.getElementsByClassName("TaskForm").length; i++) {
                  document.getElementsByClassName("TaskForm")[i].style.display = "none";
                }
              }
              document.getElementById("projectForm<?php echo $project["Id"]?>").style.display = "block";
            }

          });
                
          /** script om projectForm invisible te maken */
          $( "#closeProjectTab<?php echo $project["Id"]?>" ).click( function() {
            for(i = 0; i < document.getElementsByClassName("projectForm").length; i++) {
              document.getElementsByClassName("projectForm")[i].style.display = "none";
            }
          });

        </script>
      </td>

      <!-- de tweede kolom van deze row -->
        <td class="backlog">
          <button class="addTaskbtn" id="addTaskbtn<?php echo $project["Id"]?>" type="button" ><i class="fas fa-plus"></i></button><!-- button om een task toe tevoegen -->
          
          <!-- tasks draggables en taskForm -->
          <?php foreach( $tasks as $task ){ 
            if( $task['projectId'] == $project['Id'] ){ /** deze regel is om te kijken of de task wel in deze project hoort */
              foreach( $users as $user ){  
                if($user['Id'] == $task['Assigned_To']){/** deze regel is om de juiste user kleur in de task te zetten */
                  if($task['Progress'] == 0){?> <!-- deze regel zorgt ervoor dat alle task in de juiste kolom komen -->
                      
                    <!-- tasks draggable -->
                    <div id="<?php echo $task["Id"];?>" class="<?php echo $task["projectId"];?> draggable" draggable="true">
                      <p></a><?php echo $task["Task_name"];?></p><br> <!-- hier staat de naam van de task -->
                      <div class="taskColor" style="background-color:<?php echo $user['Color'] ?>"></div> <!-- hier staan de kleur en button(volgende regel) van de task -->
                      <button class="taskInfoBtn" data-transition="pop"  data-rel="popup" href="#" id="taskInfoBtn<?php echo $task["Id"] ?>"><i class="fas fa-eye"></i></button>
                    </div>

                  <?php }
                }
              }
            } 
          } ?>

          <!-- de code voor tasksForm -->
          <div class="TaskForm" id="TaskForm<?php echo $project["Id"]?>" name="TaskForm">
            <form name="addTask" method="post" action="<?php echo URL ?>Projects/addTaskOneProject/<?php echo $project["Id"] ?>" class="form-container2"><br><br>
              <input type="text" placeholder="task Name:" name="Task_name" required><br><br>
              <input type="text" placeholder="Task description:" name="description" required><br><br>
              <select name="Assigned_To" required>
                <option value="" selected>assigned to</option>
                <?php foreach( $users as $user ){ ?>
                  <option value="<?php echo $user['Id'] ?>" style="background-color:<?php echo $user['Color'] ?>"><?php echo $user["Name"] ?></option>
                <?php } ?>
              </select><br>
              <br><br><br><br><br><br>
              <button type="button" id="closeAddTaskTab<?php echo $project["Id"]?>">Close add task</button>
              <button type="submit" value="submit">add task</button>
            </form>
          </div>

          <!-- de script voor tasksForm -->
          <script scr="jquery-3.5.1.min.js">
                 
            $( "#addTaskbtn<?php echo $project["Id"]?>" ).click( function() {
                  
            /** TaskForm invisible maken */  
              if ($(".TaskForm").is(":visible")) {
                for(i = 0; i < document.getElementsByClassName("TaskForm").length; i++) {
                  document.getElementsByClassName("TaskForm")[i].style.display = "none";
                }
              }

              /** TaskForm visible maken en andere forms invisible */
              else{
                if ($(".myTask").is(":visible")) {
                  for(i = 0; i < document.getElementsByClassName("myTask").length; i++) {
                    document.getElementsByClassName("myTask")[i].style.display = "none";
                  }
                }

                if ($(".projectForm").is(":visible")) {
                  for(i = 0; i < document.getElementsByClassName("projectForm").length; i++) {
                    document.getElementsByClassName("projectForm")[i].style.display = "none";
                  }
                }

                document.getElementById("TaskForm<?php echo $project["Id"]?>").style.display = "block";
              }
            });
                
            /** TaskForm invisible maken als er op closeAddTaskTab is geklikt */
            $( "#closeAddTaskTab<?php echo $project["Id"]?>" ).click( function() {
                for(i = 0; i < document.getElementsByClassName("TaskForm").length; i++) {
                document.getElementsByClassName("TaskForm")[i].style.display = "none";
              }
            });

          </script>
        </td>

        <!-- droppables -->
        <!-- de derde kolom van deze row -->
        <td class="dropTD">
          <div class="droppable dropDIV" data-draggable-id="<?php echo $project["Id"];?>" name="1">
            <?php foreach( $tasks as $task ){ 
              if( $task['projectId'] == $project['Id'] ){
                foreach( $users as $user ){  
                  if($user['Id'] == $task['Assigned_To']){ 
                    if($task['Progress'] == 1){?> <!-- deze regel zorgt ervoor dat alle task in de juiste kolom komen -->
                      
                      <!-- de task -->
                      <div id="<?php echo $task["Id"];?>" class="<?php echo $task["projectId"];?> draggable" draggable="true">
                        <p></a><?php echo $task["Task_name"];?></p><br>
                        <div class="taskColor" style="background-color:<?php echo $user['Color'] ?>"></div>
                        <button class="taskInfoBtn" data-transition="pop"  data-rel="popup" href="#"  id="taskInfoBtn<?php echo $task["Id"] ?>"><i class="fas fa-eye"></i></button>
                      </div>

                    <?php }
                  }
                }
              } 
            } ?>
          </div>
        </td>

        <!-- de vierde kolom van deze row -->
        <td class="dropTD">
          <div class="droppable dropDIV" data-draggable-id="<?php echo $project["Id"];?>" name="2">
            <?php foreach( $tasks as $task ){ 
              if( $task['projectId'] == $project['Id'] ){
                foreach( $users as $user ){  
                  if($user['Id'] == $task['Assigned_To']){ 
                    if($task['Progress'] == 2){?> <!-- deze regel zorgt ervoor dat alle task in de juiste kolom komen -->
                        
                        <!-- de task -->
                        <div id="<?php echo $task["Id"];?>" class="<?php echo $task["projectId"];?> draggable" draggable="true">
                          <p></a><?php echo $task["Task_name"];?></p><br>
                          <div class="taskColor" style="background-color:<?php echo $user['Color'] ?>"></div>
                          <button class="taskInfoBtn" data-transition="pop"  data-rel="popup" href="#" id="taskInfoBtn<?php echo $task["Id"] ?>"><i class="fas fa-eye"></i></button>
                        </div>

                    <?php }
                  }
                }
              } 
            } ?>
          </div>
        </td>

        <!-- de vijfde kolom van deze row -->
        <td class="dropTD">
          <div class="droppable dropDIV" data-draggable-id="<?php echo $project["Id"];?>" name="3">
            <?php foreach( $tasks as $task ){ 
              if( $task['projectId'] == $project['Id'] ){
                foreach( $users as $user ){  
                  if($user['Id'] == $task['Assigned_To']){ 
                    if($task['Progress'] == 3){?>
                        
                      <!-- de task -->
                      <div id="<?php echo $task["Id"];?>" class="<?php echo $task["projectId"];?> draggable" draggable="true">
                        <p></a><?php echo $task["Task_name"];?></p><br>
                        <div class="taskColor" style="background-color:<?php echo $user['Color'] ?>"></div>
                        <button class="taskInfoBtn" data-transition="pop"  data-rel="popup" href="#" id="taskInfoBtn<?php echo $task["Id"] ?>"><i class="fas fa-eye"></i></button>
                      </div>

                    <?php }
                  }
                } ?>

                <!-- de code voor myTask -->
                <div class="myTask" id="myTask" name="myTask<?php echo $task["Id"] ?>">
                  <form name="update-<?php echo $task["Id"]?>" method="post" action="<?php echo URL ?>Projects/IngevuldeTaskOneProject/<?php echo $project["Id"] ?>" class="form-container2"><br><br>
                      <input type="text" placeholder="Task Name:" name="Task_name" required value="<?php echo $task["Task_name"];?>"><br><br>
                      <input type="text" placeholder="Task description:" name="description" required value="<?php echo $task["description"]?>"><br><br>
                      
                      <select name="Assigned_To" required>
                        <option value="">assigned to</option>
                        <?php foreach( $users as $user ){ 
                          if($task["Assigned_To"] == $user["Id"]){ ?>
                            <option selected value="<?php echo $user['Id'] ?>" style="background-color:<?php echo $user['Color'] ?>"><?php echo $user["Name"] ?></option>
                          <?php }
                          else{ ?>
                            <option value="<?php echo $user['Id'] ?>" style="background-color:<?php echo $user['Color'] ?>"><?php echo $user["Name"] ?></option>
                          <?php }
                        } ?>
                      </select><br>

                      <input type="text" name="taskId" value="<?php echo $task['Id'] ?>" hidden><br><br><br><br><br><br>
                      <button type="button" id="closeTaskTab<?php echo $task["Id"] ?>">Close task</button>
                      <button type="submit" value="submit">Save</button>
                    </form>
                  </div>

                  <!-- de script voor myTask -->
                  <script scr="jquery-3.5.1.min.js">
                  
                  $( "#taskInfoBtn<?php echo $task["Id"] ?>" ).click( function() {
                    if ($(".myTask").is(":visible")) {
                      for(i = 0; i < document.getElementsByClassName("myTask").length; i++) {
                        document.getElementsByClassName("myTask")[i].style.display = "none";
                      }
                    }

                    else{
                      if ($(".TaskForm").is(":visible")) {
                        for(i = 0; i < document.getElementsByClassName("TaskForm").length; i++) {
                          document.getElementsByClassName("TaskForm")[i].style.display = "none";
                        }
                      }
                      if ($(".projectForm").is(":visible")) {
                        for(i = 0; i < document.getElementsByClassName("projectForm").length; i++) {
                         document.getElementsByClassName("projectForm")[i].style.display = "none";
                        }
                      }
                      document.getElementsByName("myTask<?php echo $task["Id"] ?>")[0].style.display = "block";
                    }
                  });

                /** myTask invisible maken als er op closeAddTaskTab is geklikt */
                $( "#closeTaskTab<?php echo $task["Id"] ?>" ).click( function() {
                  for(i = 0; i < document.getElementsByClassName("myTask").length; i++) {
                    document.getElementsByClassName("myTask")[i].style.display = "none";
                  }
                });

             </script>

            <?php } 
          } ?>
        </div>
      </td>

      <!-- de zesde kolom van deze row -->
      <td class="droppable" data-draggable-id="<?php echo $project["Id"]?>" id="done" name="4">
        <!-- deze code zorgt er voor dat het juiste aantal completed tasks in de laatste kolom komen te staan -->
        <?php $i = 0;
          foreach( $tasks as $task ){
            if( $task['projectId'] == $project['Id'] ){
              if( $task["Progress"] == 4){ /** deze regel zorgt ervoor dat alle task in de juiste kolom komen --> */
                $i++; ?>
              <?php }
            }
          }
          echo " <h3 class='doneText' >number of completed tasks: </h3><br><br> ";
          echo "<h1 class='doneNumber' >$i</h1>";
        ?>
      </td>

    </tr>
  <?php } ?>
    
</table>

<!-- dit is een voor het stukje ruimte aan het eind van de pagina ( hoe hoger het getal in de while hoe meer ruimte aan het eind van de pagina ) -->
<?php $i=0;
  while($i < 60){?>
    <br> <?php
    $i=$i + 1;
  } 
?>

<!-- styling voor de table, de tasks, de forms en drag and drop -->
<style>

    /** dit is voor de styling van de table */
    table{
      position:absolute; 
      top:120px; 
      right:0px;
      width:100%;
      background-color:black;
      display: table;
      table-layout: fixed;
    }

    .td{
      width:16.6%;
      background-color:white;
    }  

    .projectName{
      position:relative; 
    }

    .projectName .project_btn{
        width:50px;
        height:50px;
        opacity:1;
        border-radius: 0px 0px 8px 0px;
        border:solid 2px black;
        position:absolute;
        top:-2px;
        left:-2px;
        background-color:white;
    }

    td>button>i{
      color:black;
    }

    /** dit is voor de drag and drop */
    .droppable.droppable-hover {
      border-width: 2px;
      transform: scale(1.05);
    }

    .droppable.dropped {
      border-style: solid;
      color: #fff;
    }

    .droppable.dropped span {
      font-size: 0.75rem;
      margin-top: 0.5rem;
    }

    .droppable.dropped i {
      pointer-events: none;
    }

    .draggable.dragged {
      user-select: none;
      opacity: 1;
    }

    .draggable:hover{
      cursor:move;
    }

    .draggable.dragged:hover {
      opacity: 1;
    }

    /** basic task styling */
    .draggable{
      width:3.8vw;
      height:2.5vw;
      background-color: var(--bg-primary);
      border:solid 2px black;
      border-radius:8px;
      margin:5px;
      text-align: center;
      padding-bottom:15px; 
      position:relative;
    }

    .draggable p{
      display:inline;
      word-wrap: break-word;
      margin-block-end: 0;
      color: var(--text-primary);
    }

    .droppable{
      padding-left:20px;
      height:200px;
    }

    .taskColor{
      width:50%;
      height:30%;
      border:solid 1px black;
      border-radius:0 0 8px 0;
      position:absolute;
      bottom:-1px;
      right:-1px;
    }

    .taskInfoBtn{
      width:50%;
      height:34%;
      border:solid 1px black;
      border-radius:0 0 0 8px;
      position:absolute;
      bottom:-1px;
      left:-1px;
      background-color:white;
      color:black;
    }

    .addTaskbtn{
      width:4vw;
      height:3.8vw;
      border:solid 2px black;
      border-radius:8px;
      margin:5px;
      padding-bottom:5px; 
      position:relative;
      background-color:#bebebe;
      color:black;
      opacity:0.8;
      cursor:pointer;
    }

    .addTaskbtn i{
      position:absolute;
      left:50%;
      top:50%;
      transform:translate(-50%, -50%);
      font-size:1.5rem;
    }

    button{
      cursor:pointer;
    }

    #done{
      position:relative;
    }

    .doneNumber{
      font-size:3rem;
      opacity:0.8;
    }

    .doneText{
      position:absolute;
      top:10px;
      left:50%;
      transform:translate(-50%);
      opacity:0.8;
    }

    /** form styling */
    .task-form-popup{
      position:absolute;
      left:50%;
      transform:translate(-50%);
      display: none;
      border: 3px solid #f1f1f1;
      z-index: 9;
      border-radius:30px 30px 0px 0px;
      background-color: white;
    }

    /** td styling */
    .backlog{
      display: flex;
      flex-wrap: wrap;
      height:200px;
      overflow: hidden;
      overflow-y: auto;
    }
    
    .dropDIV{
        display: flex;
        flex-wrap: wrap;
    }

    .dropTD{
      height:200px;
      overflow: hidden;
      overflow-y: auto;
    }

    /** table scrollbar styling */
    .backlog::-webkit-scrollbar{
    	width:0.5rem;
    }

    .backlog::-webkit-scrollbar-track{
    	background:#ffffff;
    	-webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.3); 
    }

    .backlog::-webkit-scrollbar-thumb{
    	background: var(--bg-primary);
      -webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.5);
    }

    .dropTD::-webkit-scrollbar{
    	width:0.5rem;
    }

    .dropTD::-webkit-scrollbar-track{
    	background:#ffffff;
    	-webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.3); 
    }

    .dropTD::-webkit-scrollbar-thumb{
    	background: var(--bg-primary);
      -webkit-box-shadow: inset 0 0 6px     rgba(0,0,0,0.5);
    }

</style>

<!-- de script voor drag and drop en opslaan met ajax -->
<script>

  // de benodigde data van draggables en droppables worden hier opgehaald en in een nodelist gestopt
  const draggableElements = document.querySelectorAll(".draggable");
  const droppableElements = document.querySelectorAll(".droppable");

  /** voor iedere draggableElement deze functies uitvoeren */
  /** eventListeners zorgen ervoor dat zodra er iets gedaan word er een functie start in dit geval ( bij dragstart word de functie dragstart uitgevoerd ) */
  draggableElements.forEach(elem => {
  elem.addEventListener("dragstart", dragStart);
  });

  /** voor iedere droppableElement deze functies uitvoeren */
  droppableElements.forEach(elem => {
    elem.addEventListener("dragenter", dragEnter);
    elem.addEventListener("dragover", dragOver);
    elem.addEventListener("dragleave", dragLeave);
    elem.addEventListener("drop", drop);
  });

  // Drag and Drop Functions

  //functie start bij dragstart
  function dragStart(event) {
    targetData = [event.target.id , event.target.classList[0]];
    event.dataTransfer.setData("plain", targetData);
  }

  //functie start bij dragenter
  function dragEnter(event) {
    event.target.classList.add("droppable-hover");
  }

  //functie start bij dragover
  function dragOver(event) {
    event.preventDefault();
  }

  //functie start bij dragleave
  function dragLeave(event) {
    event.target.classList.remove("droppable-hover");;
  }

  //functie start bij drop
  function drop(event) {
    event.preventDefault();
    event.target.classList.remove("droppable-hover");
    var draggableElementData = event.dataTransfer.getData("plain").split(","); //dit split de data die is gestuurd in dragstart bij iedere "," die er in staat
    const droppableElementData = event.target.getAttribute("data-draggable-id"); //haalt de data-draggable-id op uit de droppableElement
    if(draggableElementData.includes(droppableElementData)){ // als draggableElementData droppableElement ( de id van de project ) bevat dan mag de draggableElement in de droppableElement gedropt worden
      // de if zorgt ervoor dat je geen tasks in andere projecten kan stoppen dan bedoelt is
      const draggableElementId = draggableElementData[0];
      const draggableElement = document.getElementById(draggableElementId);
      const dropzone = event.target;
      dropzone.insertBefore(draggableElement, dropzone.childNodes[0])//zorgt ervoor dat draggableElement voor de eerste task in de droppableElement komt te staan
      event.dataTransfer.clearData();
      const Progress = event.target.getAttribute("name");

      //deze ajax code zorgt ervoor dat de aanpassingen in progress wordt aangepast in de database zonder op een knop te klikken 
	    $.ajax({
	    	url: "<?php echo URL ?>projects/save",
	    	type: "POST",
	    	data: { Progress: Progress, Id: draggableElementId, projectId: droppableElementData },
	    	cache: false,
	  	});
      
      //dit verwijderd de task als hij in de done kolom komt te staan ( let op: dit verwijderd de task uit de table niet uit de database )
      if(Progress == "4"){
        var removeTask = document.getElementById(draggableElementId);
        removeTask.parentNode.removeChild(removeTask);
        //we hebben geen oplossing kunnen vinden om in de done kolom het getal aan te passen zodra er een 
        //task wordt in gedropt maar ik neem aan dat de code daarvoor hier zou moeten komen.
        //dit kunnen jullie zelf toevoegen als dat gewenst is
        //voor nu moeten jullie de pagina handmatig refreshen en dan wordt dit getal wel aangepast
        //ps: het lijkt alsof deze pagina precies het zelfde is als projects/index maar de kleine aanpassingen maken een groot verschil
        //ik heb de documentatie wel het zelfde gemaakt zodat er niet telkens tussen de twee geswitched hoeft te worden
      }
    }
  }

</script>
</body>
</html>
