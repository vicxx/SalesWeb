<?php

$con=new mysqli("localhost", "root", "", "salesweb");
$query = "select * from bill";

$result = mysql_query($query);
?>

<html>
    <title>
        <head> Orders </head>
    </title>
    
    <body>
        <table align = "center" border="1px" style="width:600px; line-height:40px;">
    <tr>
        <th colspan="4"> <h2>Orders </h2></th>
    </tr>
            
    <t>
        <th> Bill Number </th>
        <th> Bill Date </th>
        <th> Mobile </th>
    </t>
       
        <?php
        while ($rows = mysql_fetch_assoc($result))
        {
         ?>
    <tr>
        <td><?php echo $rows['bill_no'];?></td>
        <td><?php echo $rows['bill_date'];?></td>
        <td><?php echo $rows['mobile'];?></td>
    </tr>
    <?php
       }
       ?>
</table>
        
        
    </body>
</html>