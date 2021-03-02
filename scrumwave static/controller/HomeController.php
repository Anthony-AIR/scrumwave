<?php

require(ROOT . "model/functieModel.php");

function index(){
	render("home/index", array('projects' => getAllProjects()));
}

function required(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	if (empty($_POST["Name"])) {
			$nameErr = "Een project naam is verplicht in te vullen!";
			render("home/index", array('projects' => getAllProjects(),"nameErr" => $nameErr ));
		}

    	else if(!empty($_POST["Name"])){
			store();
		}
	}
}

function isDone($id){
	doneProject($id);
	index();
}

function getDoneProjects(){
	render("home/index", array('doneProject' => doneProjects()));
}

function oneProject($id){
	render2("home/project2", array( 'projects' => getProjectById($id), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers()));
}

function allProjects(){
	render2("projects/index", array( 'projects' => getAllProjects(), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers() ));
}

function getTaskById($id){
	render("home/project2" , array('taskById' => getTasksById($id)));
}