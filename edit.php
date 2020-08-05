<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('$err[11]');window.location.href='login.php';</script>";
} else {
    $uname = $_SESSION['user'];
}
if (isset($_POST['update'])) {
    $uid = $_POST['uid'];
    $ufname = $_POST['ufn'];
    $ulname = $_POST['uln'];
    $uemail = $_POST['ueml'];
    $umobile = $_POST['umob'];

    $up = "UPDATE contacts SET fname='$ufname', lname='$ulname', email='$uemail', mobile='$umobile' WHERE id='$uid'";
    $results1 = mysqli_query($conn, $up);

    if ($results1 = true) {
        echo "<script>alert('$err[6]');window.location.href='view.php';</script>";
    } else {
        echo "<script>alert('$err[3]');window.location.href='edit.php';</script>";
    }
}
?>
    <section>
        <h1>Edit Contact</h1>
        <form method="POST">
            <table>
                <tr>
                    <th colspan="40"><h1>Search contacts to edit</h1></th>
                </tr>
                <tr>
                    <td><input class="add" name="fn" type="text" placeholder=" Enter first name"></td>
                    <td><input class="add" name="ln" type="text" placeholder=" Enter last name"></td>
                    <td><input class="add" name="eml" type="email" placeholder=" Enter email address"></td>
                    <td><input class="add" name="mob" type="number" placeholder=" Enter mobile no."></td>
                </tr>
                <tr>
                    <td colspan="40" class="td1">
                        <input class="addbtn" type="submit" name="ser" value="Search">
                    </td>
                </tr>
                <br>
<?php

if (isset($_POST['ser'])) {
    $sfname = $_POST['fn'];
    $slname = $_POST['ln'];
    $semail = $_POST['eml'];
    $smobile = $_POST['mob'];
    $sql = "SELECT * FROM contacts WHERE fname='$sfname' AND lname='$slname' AND email='$semail' AND mobile='$smobile';";
    $results = mysqli_query($conn, $sql);
    $resultsCkeck = mysqli_num_rows($results);
    $row = mysqli_fetch_assoc($results);
    if ($resultsCkeck == 1) {
        echo "<tr>" . "<td><input type='hidden' name='uid' value='" . $row['id'] . "'><input type='text' name='ufn' value='" . $row['fname'] . "'></td>" . "<td><input type='text' name='uln' value='" . $row['lname'] . "'></td>" . "<td><input type='text' name='ueml' value='" . $row['email'] . "'></td>" . "<td><input type='number' name='umob' value='" . $row['mobile'] . "'></td>" . "</tr>" . "<tr>" . "<td colspan='40' class='td1'>" . "<input class='update' type='submit' name='update' value='Update'>" . "</td>" . "</tr>";

    } else {
        echo "<script>alert('$err[5]');</script>";
    }
}

?>
            </table>
        </form>
    </section>

<?php
include 'footer.php';
?>
