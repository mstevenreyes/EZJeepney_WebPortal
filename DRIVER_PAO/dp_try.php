<?php
include_once 'dbh_inc.php';

$sql1 = "SELECT absences from absences";
$sql2 = "SELECT date from leaves";
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

?> 
<table>
<thead>
    <tr>
        <th class="border-top-0">Absences</th>
        <th class="border-top-0">Leaves Taken</th>
    </tr>
</thead>

<?php
// Storing records/rows into array
//Getting Tickets according to driver name
$sql1 = "SELECT absences from absences";
$sql2 = "SELECT date from leaves";
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$counter = 1;
$scounter = 1;

// Storing records/rows into array
if (mysqli_num_rows($result2) > 0) {
    while($row1 = mysqli_fetch_assoc($result2)) {
        if (mysqli_num_rows($result1) > 0) { 
            while($row2 = mysqli_fetch_assoc($result1)) {
?>      <tr>
        <td><?php echo date("m/d/Y", strtotime($row2['absences']));?></td>
<?php   
            ++$counter;
            if ($counter > $scounter){break;}
            }
?>       
        <td><?php echo date("m/d/Y", strtotime($row1['date']));?></td></tr>
        <?php
        }
        ++$scounter;
    }
}
?>   
</tbody>
</table>
