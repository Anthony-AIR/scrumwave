<?php

require(ROOT . "model/functieModel.php");

function index(){
	render2("projects/index", array( 'projects' => getAllProjects(), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers() ));
}

function home(){
	render("home/index", array( 'projects' => getAllProjects() ));
}

function edit(){
	addUser($_POST, $_POST["color"]);
	index();
}

function TaksCreate(){
	addTask($_POST);
	index();
}
function save(){
	$update = updateProgress($_POST);
	render2("projects/index", array( 'projects' => getAllProjects(), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers(), 'CountDone' => countDone($_POST["projectId"]) ));
}

function IngevuldeTask($id){
	createTaskInfo($_POST, $_POST["taskId"]);
	index();
}
function addTask($id){
	createTask($_POST, $id);
	index();
}
function updateProjects($id){
	updateAllFromProject($_POST, $id);
	index();
}
function IngevuldeTaskOneProject($id){
	createTaskInfo($_POST, $_POST["taskId"]);
	render2("home/project2", array( 'projects' => getProjectById($id), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers()));
}
function addTaskOneProject($id){
	createTask($_POST, $id);
	render2("home/project2", array( 'projects' => getProjectById($id), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers()));
}
function updateProjectsOneProject($id){
	updateAllFromProject($_POST, $id);
	render2("home/project2", array( 'projects' => getProjectById($id), 'tasks' => getAllTasks(), 'users' => getAllUsers(), 'noneUsers' => getAllNoneUsers()));
}
function delete(){
	deleteUser($_POST["color"]);
	index();
}