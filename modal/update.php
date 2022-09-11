<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>

<p class="t botli"><?=$STR->uH?></p>

<form action="../api/update.php" method="post" enctype="multipart/form-data">
<table class="aut">
    <tr>
        <td><?=$STR->aT[0]?></td>
        <td><input type="file" name="img" id="img"></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="table" value="<?=$do?>">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>