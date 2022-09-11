<?php
$DB = new DB($do);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$STR->h?></p>
    <form method="post" action="./api/update_text.php">
        <table class="ct w-50 aut">
            <tr>
                <td class="yel"><?=$STR->t[0]?></td>
                <td>
                    <input type="text" name="text" id="text" value="<?=$DB->find(1)['text']?>" style="width: 98%;">
                </td>
            </tr>
        </table>
        <table style="margin-top:40px;" class="ct w-50 aut">
            <tbody>
                <tr>
                    <td class="cent">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="table" value="<?=$do?>">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>