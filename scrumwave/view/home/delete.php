<style>
 div{
    margin-top:150px;
 }
</style>

<div class="alert alert-dark text-center" role="alert">
    <strong>Delete</strong>&nbsp; &nbsp;Weet je zeker dat je project: <?php foreach($names as $name){?> <?php echo $name["Name"]?> <?php } ?> wilt verwijderen?

</div>
<form class="text-center"action="<?php echo URL ?>home/destroy/<?php echo $id ?>">
<button class="btn btn-danger" type="submit">Delete</button>
<a class="btn btn-info" href="<?php echo URL ?>home/index">Cancel</a>
</form>