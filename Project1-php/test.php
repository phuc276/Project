<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <?php // Xử Lý Upload
    $typeimg = array("png", "jpg", "jpeg", "gif");

    $x = explode("/", $_FILES['avatar']['type']);

    $type = array_pop($x);
    $size = $_FILES['avatar']['size'];
    $checktype = in_array($type, $typeimg);


    if (isset($_POST['uploadclick'])) {


        if (!empty($_FILES['avatar']['name'])) {

            // check
            if ($_FILES['avatar']['error'] > 0 || $checktype == false || $size > 1024 * 1024) {
                echo 'File Upload Bị Lỗi';
            } else {
                // Upload file
                move_uploaded_file($_FILES['avatar']['tmp_name'], './test-php/' . $_FILES['avatar']['name']);
                echo 'File Uploaded';
            }
        } else {
            echo 'Bạn chưa chọn file upload';
        }
    }
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="avatar" />
        <input type="submit" name="uploadclick" value="Upload" />
    </form>

</body>

</html>