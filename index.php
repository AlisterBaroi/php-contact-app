<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
} else {
    $uname = $_SESSION['user'];
    echo "<script>alert('$err[12]');window.location.href='view.php';</script>";
}
?>
    <section>
        <h1>Welcome To <br><br> Contact App <br><br></h1>
        <p>By <br><br> Alister 0340938 <br><br> Muntahin 0341137</p>

    </section>

<?php
include 'footer.php';
?>
