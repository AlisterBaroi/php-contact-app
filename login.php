<?php
include 'nav.php';

if (isset($_SESSION['user'])) {
    $uname = $_SESSION['user'];
    echo "<script>alert('$err[12]');window.location.href='view.php';</script>";
} else {
}

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = sha1($_POST['pass']);

    $lg = "SELECT * FROM user WHERE uname='$uname' AND pass='$pass'";
    $res = mysqli_query($conn, $lg);
    $chek = mysqli_num_rows($res);

    if (empty($uname) || empty($pass)) {
        echo "<script> alert('$err[8]')</script>";
    } elseif ($chek > 0) {
        $_SESSION['user'] = $uname;
        echo "<script>alert('$err[9]');window.location.href='view.php';</script>";
    } else {
        echo "<script>alert('$err[8]');window.location.href='login.php';</script>";
    }
}
?>

    <section>
        <form method="POST">
            <table  class="lgform">
                <tr><th><h1>Log in</h1><br></th></tr>
                <tr>
                    <td><input class="add1" type="text" name="uname" placeholder="User name"></td>
                </tr>
                <tr>
                    <td><input class="add1" type="password" name="pass" placeholder="User password"></td>
                </tr>
                <tr>
                    <td colspan=20><hr><input class="addbtn1" type="submit" name="login" value="Login"></td>
                </tr>
            </table>
        </form>
    </section>

<?php
include 'footer.php';
?>