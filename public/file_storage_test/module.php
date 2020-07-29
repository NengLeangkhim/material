<?php
include_once 'show.php';
include_once 'addmodule.php';
$par=addmodule::get_module();
$pos=addmodule::get_pos();
$dept=addmodule::get_dept();
$gr=addmodule::get_group();
$stf=addmodule::get_staff();
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>ADD Module:</legend>
            <label for="fname">name:</label>
            <input type="text" id="fname" name="name"><br><br>
            <label for="gname">Parent:</label>
            <select id="gname" name="parent">
            <option value="null">null</option>';
            foreach($par as $rr){
                echo '<option value="'.$rr['id'].'">'.$rr['name'].'</option>';
            }
            echo '
            </select><br><br>
            <label for="hname">Link:</label>
            <input type="text" id="hname" name="link"><br><br>
            <label for="iname">Icon:</label>
            <input type="text" id="iname" name="icon"><br><br>
            <label for="jname">Sequence:</label>
            <input type="text" id="jname" name="sequence"><br><br>
            <label for="jname1">IS SHOW?:</label>
            <input type="radio" id="jnamer" name="show" value="t"><label for="jnamer">Yes</label>&nbsp
            <input type="radio" id="jnamer1" name="show" value="f"><label for="jnamer1">No</label><br><br>
            <button type="submit" name="add_mo">Add</button>
            <br>
        </fieldset>
    </form>';
    echo'<form method="post">
        <fieldset>
            <legend>Show:</legend>
            <label for="kname">Position:</label>
            <select id="kname" name="position">
            <option value="null">null</option>';
            foreach($pos as $rr){
                echo '<option value="'.$rr['id'].'">'.$rr['name']." <strong>in</strong> ".$rr['gname'].'</option>';
            }
            echo '</select><br><br>
            <label for="lname">Group:</label>
            <select id="lname" name="group">
            <option value="null">null</option>';
            foreach($gr as $rr){
                echo '<option value="'.$rr['id'].'">'.$rr['name'].'</option>';
            }
            echo '</select><br><br>
            <label for="mname">Company Dept:</label>
            <select id="mname" name="comp_dept">
            <option value="null">null</option>';
            foreach($dept as $rr){
                echo '<option value="'.$rr['id'].'">'.$rr['name'].'</option>';
            }
            echo '</select><br><br>
                <label for="stf">Staff:</label>
                <select id="stf" name="staff_id">
                <option value="null">null</option>';
            foreach($stf as $rr){
                echo '<option value="'.$rr['id'].'">'.$rr['name'].'</option>';
            }
            echo '</select><br><br>';
            foreach($par as $rr){
                echo '<input type="checkbox" value="'.$rr['id'].'" name="module_id[]" id="mo-'.$rr['id'].'"><label for="mo-'.$rr['id'].'">'.$rr['name'].'['.$rr['code'].']</label><br>';
            }
            echo '<button type="submit" name="add_mo_ac">Add Module Access</button>
        </fieldset>
    </form>';
    echo'<form method="post">
        <fieldset>
            <legend>Add T module:</legend>
            <button type="submit" name="add_t_mo">Add</button>
            <button type="submit" name="update_mo">Update Module</button>
        </fieldset>
    </form>';
echo '</body>
</html>';

if(isset($_POST['add_mo_ac'])){
    $s=addmodule::add_module_access();
    var_dump($s);
    if($s){
        header('Location: module.php');
    }
}
if(isset($_POST['add_mo'])){
    $s=addmodule::add_module();
    var_dump($s);
    if($s){
        header('Location: module.php');
    }
}
if(isset($_POST['add_t_mo'])){
    $s=addmodule::add_t_module();
    var_dump($s);
    if($s){
        header('Location: module.php');
    }
}
if(isset($_POST['update_mo'])){
    $s=addmodule::update_module();
    var_dump($s);
    if($s){
        header('Location: module.php');
    }
}
// if(isset($_POST['func_speci'])){
//     show::show_func_created_speci();
// }
?>
