<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('$err[11]');window.location.href='login.php';</script>";
} else {
    $uname = $_SESSION['user'];
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $email = $_POST['eml'];
    $mobile = $_POST['mob'];

    if (empty($fname) || empty($lname) || empty($email) && empty($mobile)) {
        echo "<script>alert('$err[1]')</script>";
    } else {
        $sql = "INSERT INTO contacts (fname, lname, email, mobile) VALUES ('$fname','$lname','$email','$mobile');";
        $results = mysqli_query($conn, $sql);
        echo "<script>alert('$err[2]')</script>";
    }
}
?>
    <section>
        <h1>Add Contacts</h1>
        <form method="POST">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
                <tr>
                    <td><input class="add" name="fn" type="text" placeholder=" Enter first name"></td>
                    <td><input class="add" name="ln" type="text" placeholder=" Enter last name"></td>
                    <td><input class="add" name="eml" type="email" placeholder=" Enter email address"></td>
                    <td><input class="add" name="mob" type="number" placeholder=" Enter mobile no."></td>
                </tr>
                <tr><td class="td1" colspan="40"><input class="addbtn" type="submit" name="submit" value="+ Add Contact"></td></tr>
            </table>
        </form>
    </section>

<?php
include 'footer.php';
?>
