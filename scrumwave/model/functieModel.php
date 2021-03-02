<?php
    function getAllProjects(){
        $conn = openDatabaseConnection();
        $sql = "SELECT * FROM projects WHERE Status = 'ongoing'";
        $statement = $conn->prepare($sql);
        $statement->execute();
    
        $conn = null;
    
        return $statement->fetchAll();
    }

    function getAllTasks(){
        $conn = openDatabaseConnection();
    
        $sql = "SELECT * FROM tasks";
        $statement = $conn->prepare($sql);
        $statement->execute();
    
        $conn = null;
    
        return $statement->fetchAll();
    }

    function getAllUsers(){
        $conn = openDatabaseConnection();
    
        $sql = "SELECT * FROM users WHERE Name != '' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
    
        $conn = null;
    
        return $statement->fetchAll();
    }

    function getAllNoneUsers(){
        $conn = openDatabaseConnection();
    
        $sql = "SELECT * FROM users WHERE Name = '' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
    
        $conn = null;
    
        return $statement->fetchAll();
    }

    function addUser($data, $id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE users SET Name= :Name WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":Name" , $data["Name"]);
        $statement->execute();
    }

    function createProject($Name){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("INSERT INTO projects (Name) VALUES (:Name)");
        $statement->bindParam(":Name" , $Name);
        $statement->execute();
    }
    
    function createTaskInfo($data, $id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE tasks SET Task_name = :Task_name, description = :description, Assigned_To = :AssignedTo WHERE id = :id");
        $statement->bindParam(":id" , $id);
        $statement->bindParam(":Task_name" , $data["Task_name"]);
        $statement->bindParam(":description" , $data["description"]);
        $statement->bindParam(":AssignedTo" , $data["Assigned_To"]);
        $statement->execute();
    }

    function deleteProject($id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("DELETE FROM projects WHERE Id = :id ");
        $statement->bindParam(":id",$id);
        $statement->execute();
    }

    function getProjectById($id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT * FROM projects WHERE id= :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $conn = null; 
        return $statement->fetchAll();
    }

    function updateProject($data, $id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE projects SET Name= :Name WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":Name" , $data["Name"]);
        $statement->execute();
    }

    function doneProject($id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE projects SET Status = 'Done' WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    function doneProjects(){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT * FROM projects WHERE Status = 'Done'");
        $statement->execute();
        $conn = null;
        return $statement->fetchAll();
    }

    function tasksById($id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
        $statement->execute();
        $conn = null;
        return $statement->fetchAll();
    }

    function updateProgress($data){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE tasks SET Progress= :Progress WHERE Id = :Id");
        $statement->bindParam(":Id", $data["Id"]);
        $statement->bindParam(":Progress" , $data["Progress"]);
        $statement->execute();
    }
    
    function countDone($Id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT COUNT(*) FROM tasks WHERE Progress = '4' AND projectId = Id = :Id");
        $statement->execute();
        $conn = null;
        return $statement->fetchAll();
    }

    function createTask($data, $id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("INSERT INTO tasks (Description, Task_name, Assigned_To, projectId ) VALUES (:description, :TaskName, :AssignedTo, :id )");
        $statement->bindParam(":description" , $data["description"]);
        $statement->bindParam(":TaskName" , $data["Task_name"]);
        $statement->bindParam(":AssignedTo" , $data["Assigned_To"]);
        $statement->bindParam(":id" , $id);
        $statement->execute();
    }

    function updateAllFromProject($data, $id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE projects SET description= :description, Name= :Name, Color= :Color WHERE Id = :Id");
        $statement->bindParam(":description" , $data["description"]);
        $statement->bindParam(":Name" , $data["Name"]);
        $statement->bindParam(":Color" , $data["Color"]);
        $statement->bindParam(":Id" , $id);
        $statement->execute();
    }

    function deleteUser($id){
        $empty="";
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("UPDATE users SET Name= :Name WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":Name" , $empty);
        $statement->execute();
    }
?>