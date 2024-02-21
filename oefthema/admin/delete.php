<? require '../global.php';
checkLoggedIn();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM registrations WHERE id = $id";
    if (mysqli_query($conn, $sql);) {
        header('Location: dashboard.php');
    } else {
        echo mysqli_error($conn);
    }
}