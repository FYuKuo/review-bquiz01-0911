<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
$DB = new DB($do);
?>
<p class="t botli"><?=$STR->uH?></p>

<form action="../api/add_child.php" method="post">
<table class="aut moreTable ct">
    <tr>
        <td><?=$STR->uT[0]?></td>
        <td><?=$STR->uT[1]?></td>
        <td><?=$STR->uT[2]?></td>
    </tr>
    <?php
    $rows = $DB->all(['parent'=>$_GET['id']]);
    foreach ($rows as $key => $row) {
    ?>
    <tr>
        <td>
            <input type="text" name="text[]" value="<?=$row['text']?>" style="width: 90%;">
        </td>
        <td>
            <input type="text" name="href[]" value="<?=$row['href']?>" style="width: 90%;">
        </td>
        <td>
        <input type="checkbox" name="del[]" value="<?=$row['id']?>">
        <input type="hidden" name="id[]" value="<?=$row['id']?>">
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <input type="hidden" name="parent" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="<?=$do?>">
    <input type="submit" value="確定修改">
    <input type="reset" value="重置">
    <input type="button" value="<?=$STR->uT[3]?>" onclick="more()">
</div>
</form>

<script>
    function more(){
        $('.moreTable').append(`<tr>
        <td>
            <input type="text" name="addtext[]" style="width: 90%;">
        </td>
        <td>
            <input type="text" name="addhref[]" style="width: 90%;">
        </td>
        <td>
        </td>
    </tr>`)
    }
</script>