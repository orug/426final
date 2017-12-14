<!DOCTYPE html>
<html>
    <head>
        <title>Swipes</title>
		<link rel="stylesheet" type="text/css" href="home-page.css">
    </head>
    <body>
<?php

    $host = "classroom.cs.unc.edu"; 
    $username = "thrisha";
    $password = "comp426";
    $db_name = "thrishadb";
    $tbl_name = "info_login";


    $con = mysqli_connect($host, $username, $password);

    if(mysqli_connect_errno())
        $con = false;
    else
        $cdb = mysqli_select_db($con, $db_name);


  
    
 
        echo "        <h1>Swipes Database</h1>
        <hr />
        <p />
        <table border='1'>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>email</th>
                <th>Swipes</th>
              
            </tr>\r\n";

        $sort = "";
        if(isset($_GET['sort'])) {
            switch ($_GET['sort'] ) {
            case 0: 
                        $sort = " ORDER BY username DESC"; 
                        break;
            case 1:
                        $sort = ' ORDER BY first_name DESC';
                        break;
            case 2:
                        $sort = ' ORDER BY last_name DESC';
                        break;
            case 3:
                        $sort = ' ORDER BY email DESC'; 
                        break;
            case 4: 
                        $sort = ' ORDER BY swipes DESC';
                        break;     
            }
        }
        $result = mysqli_query($con, "SELECT * FROM `login_info`" . $sort);
        while($row = mysqli_fetch_array($result)) {
            echo "            <tr>\r\n";
            echo "                <td>" . $row['username'] . "</td>\r\n";
            echo "                <td>" . $row['first_name'] . "</td>\r\n";
            echo "                <td>" . $row['last_name'] . "</td>\r\n";
            echo "                <td>" . $row['email'] . "</td>\r\n";
            echo "                <td>" . $row['swipes'] . "</td>\r\n";
                       echo "            </tr>\r\n";
        }
        echo "        </table>\r\n"; 
    	
    mysqli_close($con);

?>
        <p />Sort By:
        <a id="link" href="<?php echo $_SERVER['PHP_SELF'] . "?sort=0";?>">|Username|</a>
        <a id="link" href="<?php echo $_SERVER['PHP_SELF'] . "?sort=1";?>">|First Name|</a>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=2";?>">|Last Name|</a>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=3";?>">|Email|</a>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=4";?>">|Swipes|</a>
           </body>
</html>