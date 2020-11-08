<?php

require("dbc.php");
function getUsersData($id)
{
    global $con;
    $array = array();
    $q = mysqli_query($con,"SELECT * FROM `regProvider` WHERE `id`=".$id);

    while( $r = mysqli_fetch_array($q))
    {
        $array['id'] = $r['id'];
        $array['name'] = $r['name'];
        $array['phone'] = $r['phone'];
        $array['city'] = $r['city'];
        $array['setP'] = $r['setP'];
        $array['work'] = $r['work'];


    }
    return $array;

}

function getId($username)
{
    global $con;
    $q = mysqli_query($con,"SELECT `id` FROM `regProvider` WHERE `name` = '".$_POST['name']."' and `setP` = '".$_POST['password']."'");

    while( $r = mysqli_fetch_array($q))
    {
        return $r['id'];
    }
}

?>