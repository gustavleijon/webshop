<?php
// Checks whether upload button has been pressed
if (isset($_POST['upload'])) {
$specialproduct = strtolower($_POST['specialproduct']);
$comment = strtolower($_POST['comment']);
// Get user id
$uid = $_SESSION['uid'];
// Sets max filesize (1 MB = 1048576 bytes)
$max_file_size = 1048576;
// Sets accepted image files
$file_types = array('gif', 'jpg', 'jpeg', 'png');
// Sets folder for upload
$upload_dir = 'user.photos/';
// Sets information of uploaded file
$file_tmp = $_FILES['photo']['tmp_name'];
$file_name = $_FILES['photo']['name'];
$file_size = $_FILES['photo']['size'];
$file_uniq = uniqid();
$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
// Sets path to save uploaded file
$file_save = $upload_dir . $file_uniq . '-original.' . $file_ext;
// Checks if file is a photo
if (!getimagesize($file_tmp)) {
header('Location: ../../special.products.php?upload=empty');
exit();
}
// Checks photo filesize
if ($file_size > $max_file_size) {
header('Location: ../../special.products.php?upload=overload');
exit();
}
// Checks if uploaded file is an accepted type
if (!in_array($file_ext, $file_types)) {
header('Location: ../../special.products.php?upload=type');
exit();
}
// Checks if errors has been set
if (count($errors) == 0) {
// Saves uploaded file to folder
if (move_uploaded_file($file_tmp, $file_save)) {
// Creates session for original name and thumb
$_SESSION['file_original'] = $file_uniq . '-original.' . $file_ext;
$_SESSION['file_thumb'] = $file_uniq . '-thumb.' . $file_ext;
// Retrieve path to original and thumb photos
$file_original = 'user.photos/' . $_SESSION['file_original'];
$file_thumb = 'user.photos/' . $_SESSION['file_thumb'];
// Redirects user to resize page
$sql = 'INSERT INTO photos (uid, original, thumb, regdate) VALUES (:uid, :original,
:thumb, NOW())';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':uid', $_SESSION['uid']);
$stmt->bindValue(':original', $_SESSION['file_original']);
$stmt->bindValue(':thumb', $_SESSION['file_thumb']);
// Checks whether query executed correctly
if ($stmt->execute()) {
    // Deletes session variable for original and thumb files
    unset($_SESSION['file_original']);
    unset($_SESSION['file_thumb']);
    // Redirect user to gallery
    header('Location: https://port-3000-php-grupp4-gustavleijon1820182.preview.codeanywhere.com/orderhistory.php');
    exit();
    }
} else {
header('Location: ../../special.products.php?upload=error');
exit();
}
}
}
?>