<?php
include("config.php");
$query = "select * from student";
$query2 = $obj->query($query);

if($query2->num_rows>0){
    $show = "<table border='1' width='100%' cellspacing='0' cellpending='10px'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    </tr>";

    while($row = mysqli_fetch_assoc($query2)){
        $show.= "<tr><td>{$row['id']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td></tr>";
    }

    $show.="</table>";

    echo $show;
}
else{
   echo  "Data not found";
}


?>