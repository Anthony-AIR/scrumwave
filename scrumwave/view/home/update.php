<style>
    h1{
        margin-top:150px;
    }
</style>

<h1 class="text-center">Project aanpassen:</h1>
<br>
<?php foreach($updaten as $update){?>
    <form class="text-center" name="update" method="post" action="<?php echo URL?>Home/edit/<?php echo $update["Id"]?>"><br><br>
	    <p>Project name: &nbsp; &nbsp;<input class="text-center" type="text" name="Name" value="<?php echo $update["Name"]?>"></input></p><br><br>
        <p>Project description: &nbsp; &nbsp;<input class="text-center" type="text" name="description" value="<?php echo $update["description"]?>"></p><br><br>
        <p>Project color: &nbsp; &nbsp;
        <select style="width:140px; height:30px;" name="Color" required><br><br>
                    <?php if($update["Color"] == "red"){?>
                      <option style="background-color:red;" value="<?php echo $update["Color"]?>" selected>Important</option>
                      <option style="background-color:yellow;" value="yellow">On Hold</option>
                      <option style="background-color:#ffffff;" value="white">Standard</option>
                    <?php } 
                    else if($update["Color"] == "yellow"){?>
                      <option style="background-color:yellow;" value="<?php echo $update["Color"]?>" selected>On Hold</option>
                      <option style="background-color:red;" value="red">Important</option>
                      <option style="background-color:#ffffff;" value="white">Standard</option>
                    <?php } ?>
                    <?php if($update["Color"] == "white"){?>
                      <option style="background-color:#ffffff;" value="<?php echo $update["Color"]?>" selected>Standard</option>
                      <option style="background-color:red;" value="red">Important</option>
                      <option style="background-color:yellow;" value="yellow">On Hold</option>
                    <?php } ?>
                  </select></p><br>
        <input type="submit">
    </form>
    
<?php } ?>