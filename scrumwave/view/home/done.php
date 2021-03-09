<style>
    div{
        margin-top:150px;
    }
</style>

<div class="alert alert-dark text-center" role="alert">
    <strong></strong>&nbsp; &nbsp;Weet je zeker dat je klaar bent met dit project?
</div>
<form class="text-center"action="<?php echo URL ?>home/isDone/<?php echo $id ?>">
<button class="btn btn-success" type="submit">Bevestigen</button>
<a class="btn btn-danger" href="<?php echo URL ?>home/index">Annuleren</a>
</form>