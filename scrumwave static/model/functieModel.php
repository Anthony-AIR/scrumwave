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

    function getProjectById($id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT * FROM projects WHERE id= :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $conn = null; 
        return $statement->fetchAll();
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

    function countDone($Id){
        $conn = openDatabaseConnection();
        $statement = $conn->prepare("SELECT COUNT(*) FROM tasks WHERE Progress = '4' AND projectId = Id = :Id");
        $statement->execute();
        $conn = null;
        return $statement->fetchAll();
    }

?>