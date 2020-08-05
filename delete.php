<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('$err[11]');window.location.href='login.php';</script>";
} else {
    $uname = $_SESSION['user'];
}

?>
    <section>
        <h1>Delete Contact</h1>
        <form method="POST">
            <table>
                <tr>
                    <th colspan="40"><h1>Search contacts to delete</h1></th>
                </tr>
                <tr>
                    <td>
                        <input class="add" name="fn" type="text" placeholder=" Enter first name">
                    </td>
                    <td>
                        <input class="add" name="ln" type="text" placeholder=" Enter last name">
                    </td>
                    <td>
                        <input class="add" name="eml" type="email" placeholder=" Enter email address">
                    </td>
                    <td>
                        <input class="add" name="mob" type="number" placeholder=" Enter mobile no.">
                    </td>
                </tr>
                <tr>
                    <td class="td1" colspan="40">
                        <input class="addbtn" type="submit" name="del" value="Delete Contact">
                    </td>
                </tr>
<?php
if (isset($_POST['del'])) {
    $sfname = $_POST['fn'];
    $slname = $_POST['ln'];
    $semail = $_POST['eml'];
    $smobile = $_POST['mob'];

    $sql = "SELECT * FROM contacts WHERE fname='$sfname' AND lname='$slname' AND email='$semail' AND mobile='$smobile';";
    $results = mysqli_query($conn, $sql);
    $resultsCkeck = mysqli_num_rows($results);

    if ($resultsCkeck > 0) {
        if ($row = mysqli_fetch_assoc($results)) {
            $r0 = $row['id'];
            $r1 = $row['fname'];
            $r2 = $row['lname'];
            $r3 = $row['email'];
            $r4 = $row['mobile'];

            $del = "DELETE FROM contacts WHERE id='$r0'";
            $results1 = mysqli_query($conn, $del);
            $resultsCkeck1 = mysqli_num_rows($results1);

            if ($resultsCkeck1 > 0) {
                echo "<script>alert('$r1, $r2, $r3, $r4 $err[3]')</script>";
            } else {
                echo "<script>alert('$r1, $r2, $r3, $r4 $err[4]');window.location.href='view.php';</script>";
            }
        }
    } else {
        echo "<script>alert('$err[5]');window.location.href='delete.php';</script>";
    }
}
?>
            </table>
        </form>
    </section>

<?php
include 'footer.php';
?>
