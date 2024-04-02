<?php
include_once ('crud.php');

$o = new crud();

// insert query
// $res = $o->insert('tablename', ['col1' => 'value1', 'col2' => 'value2']);
// $res = $o->insert('student', ['name' => 'ravi', 'age' => '50', 'class' => 'PHD']);
// if ($res) {
//     echo "success ";
// } else {
//     echo "not success ";
// }


// update query
// $res=$o->update('tablename',['col1'=>'value', 'col2'=>'value','col3'=>'value'],'wherecol="value"');
// $res=$o->update('student',['name'=>'gimesh', 'age'=>'56','class'=>'MCAA'],'id="4"');
// if($res===true){
//     echo "success ";
// }
// else
// {
//     echo "not succes ";
// }


// delete query
// $res=$o->delete('tablename','wherecol="value"');
// $res=$o->delete('student','id="6"');
// if($res===true){
//     echo "success ";
// }
// else
// {
//     echo "not succes ";
// }


// sql
// $res=$o->sql('select * from student where id=4');
// if($res===true){
//     print_r($o->getResult()) ;
// }
// else
// {
//     echo "not succes ";
// }


// sql show using loop
$res = $o->sql('select * from student where class="PHD"');
// $res=$o->select('treks','*',null,null,null,null);

if ($res != "") {
    while ($row = $res->fetch_assoc()) {
        echo $row['trek_name'];
        // echo $row['id'];
        // echo $row['age'];
        // echo $row['class'];
    }
} else {
    echo "not succes ";
}

// select all
// $res=$o->select('treks','*',null,null,null,null);
// if($res===true){
//     print_r($o->getResult()) ;
// }
// else
// {
//     echo "not succes ";
// }

// select where
// $res=$o->select('tablename','*',null,'col="value"',null,null);
// $res=$o->select('student','*',null,'class="MBA"',null,null);
// if($res===true){
//     print_r($o->getResult()) ;
// }
// else
// {
//     echo "not succes ";
// }

// select order by
// $res=$o->select('student','name',null,null,'id desc',null);
// if($res===true){
//     print_r($o->getResult()) ;
// }
// else
// {
//     echo "not succes ";
// }

// select particular column
// $res=$o->select('student','name, class',null,null,'id desc',null);
// if($res===true){
//     print_r($o->getResult()) ;
// }
// else
// {
//     echo "not succes ";
// }


// select join
// $join = "table2 on table1.col = table2.col";
// $join = "class on student.class = class.name";
// $res = $o->select('student', "*", $join, null, null, null, null);
// if ($res != "") {

//     while ($row = $res->fetch_assoc()) {
//         echo $row['class'];
//     }
// } else {
//     echo "not succes ";
// }
?>