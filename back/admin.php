<?php
$DB = new DB($do);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$STR->h?></p>
    <form method="post" action="./api/edit.php">
        <table width="90%" class="ct aut">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$STR->t[0]?></td>
                    <td width="45%"><?=$STR->t[1]?></td>
                    <td width="10%">刪除</td>
                </tr>
            </tbody>
            <?php
            $rows = $DB->all();
            foreach ($rows as $key => $row) {
                if($row['acc'] != 'admin'){
            ?>
                <tr>
                    <td>
                        <input type="text" name="acc[]" value="<?=$row['acc']?>" style="width: 95%;">
                    </td>
                    <td>
                        <input type="password" name="pw[]" value="<?=$row['pw']?>" style="width: 95%;">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id']?>">
                    </td>
                    <input type="hidden" name="id[]" value="<?=$row['id']?>">
                </tr>
            <?php
                }
            }
            ?>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?do=<?=$do?>')" value="<?=$STR->aB?>">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="<?=$do?>">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>