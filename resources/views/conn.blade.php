<h1> connection sccessful</h1>
<?php
echo "<table border=1>  <th>";
    foreach ($menu as $user) {        
        echo "           
                <th><td> $user->name</td></th>
           ";
    }
    echo  " </th></table>";
?>