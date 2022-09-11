<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t botli"><?=$STR->aH?></p>

<form action="../api/add.php" method="post">
<table class="aut">
    <tr>
        <td><?=$STR->aT[0]?></td>
        <td><textarea name="text" id="text" cols="30" rows="10"></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="table" value="<?=$do?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>