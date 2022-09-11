<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);

if(isset($_POST['id'])){
    foreach ($_POST['id'] as $key => $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $data = $DB->find($id);

            $data['text'] = $_POST['text'][$key];
            $data['href'] = $_POST['href'][$key];

            $DB->save($data);
        }
    }
}


if(isset($_POST['addtext'])){
    $menu = [];

    foreach ($_POST['addtext'] as $key => $text) {
        $menu['text'] = $_POST['addtext'][$key];
        $menu['href'] = $_POST['addhref'][$key];
        $menu['sh'] = 1;
        $menu['parent'] = $_POST['parent'];

        // dd($menu);
        $DB->save($menu);
    }    
}

to("../back.php?do=$table");
?>