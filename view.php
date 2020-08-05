<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('$err[11]');window.location.href='login.php';</script>";
} else {
    $uname = $_SESSION['user'];
}

?>
    <section>
        <h1>View Contacts</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
<?php
$sql = "SELECT * FROM contacts;";
$results = mysqli_query($conn, $sql);
$resultsCkeck = mysqli_num_rows($results);

if ($resultsCkeck > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>" . "<td class='add td1'>" . $row['fname'] . "</td>" . "<td class='add td1'>" . $row['lname'] . "</td>" . "<td class='add td1'>" . $row['email'] . "</td>" . "<td class='add td1'>" . $row['mobile'] . "</td>" . "</tr>";
    }
} else {
    echo "<tr>" . "<td colspan='40' class='add td1'>" . $err[0] . "</td>";
}
?>
    </table>
    </section>

<?php
include 'footer.php';
?>
