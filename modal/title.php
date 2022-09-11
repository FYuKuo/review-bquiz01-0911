<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t botli"><?=$STR->aH?></p>


<form action="../api/add.php" method="post" enctype="multipart/form-data">
<table class="aut">
    <tr>
        <td><?=$STR->aT[0]?></td>
        <td><input type="file" name="img" id="img"></td>
    </tr>
    <tr>
        <td><?=$STR->aT[1]?></td>
        <td><input type="text" name="text" id="text"></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="table" value="<?=$do?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>