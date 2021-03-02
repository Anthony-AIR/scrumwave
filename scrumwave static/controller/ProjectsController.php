<?php

require(ROOT . "model/functieModel.php");

function index(){
	render2("projects/index", array( 'projects' => getAllProjects(), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers() ));
}

function home(){
	render("home/index", array( 'projects' => getAllProjects() ));
}
