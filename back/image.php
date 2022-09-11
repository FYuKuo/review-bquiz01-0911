<?php
$DB = new DB($do);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$STR->h?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%" class="ct">
            <tbody>
                <tr class="yel">
                    <td width="65%"><?=$STR->t[0]?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
            </tbody>
            <?php
            $num = $DB->math('COUNT','id');
            $limit = 3;
            $pages = ceil($num/$limit);
            $page = ($_GET['page'])??1;
            if($page <= 0 || $page > $pages){
                $page = 1;
            }
            $start = ($page-1)*$limit;
            $limitSql = " LIMIT $start,$limit";
            $rows = $DB->all($limitSql);
            foreach ($rows as $key => $row) {
            ?>
                <tr>
                    <td>
                        <img src="./img/<?=$row['img']?>" alt="" style="width: 100px;height:68px">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh'] == 1)?'checked':''?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id']?>">
                    </td>
                    <td>
                    <input type="button" onclick="op('#cover','#cvr','./modal/update.php?do=<?=$do?>&id=<?=$row['id']?>')" value="<?=$STR->uB?>">
                    </td>
                    <input type="hidden" name="id[]" value="<?=$row['id']?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="page ct">
            <?php
            if($page > 1){
            ?>
            <a href="?do=<?=$do?>&page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?do=<?=$do?>&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }
            if($page < $pages){
            ?>
            <a href="?do=<?=$do?>&page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>
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