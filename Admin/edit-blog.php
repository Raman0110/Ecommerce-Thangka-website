<?php require('../session.php');
issetUsername()     ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
    <?php
    $Msg = '';
    include '../connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM blogs WHERE id = $id";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            if (mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
            } else {
                header('location:error.php');
            }
        }
    }else{
        header('location:error.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $uploadDir = '../uploads/';
        $fileName = $_FILES['image']['name'];
        if (empty($fileName)) {
            $sql = "UPDATE blogs SET title = '$name', categoryId = '$category', description = '$description' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location:view-blog.php');
                $Msg = 'Blog edited successfully';
            } else {
                $Msg = 'Unable to edit blog';
            }
        } else {
            $newFile = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date('YmdHis') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $targetDir = $uploadDir . $newFile;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
                $sql = "UPDATE blogs set title = '$name', categoryId = '$category', description = '$description', image = '$newFile' WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $Msg = 'Blog edited successfully';
                    header('location:view-blog.php');
                } else {
                    $Msg = 'Unable to edit blog';
                }
            } else {
                $Msg = 'Error uploading file';
            }
        }
    }
    ?>
    <div class="layout-container">
        <?php
        include 'side-bar.php';
        ?>
        <main class="main-section">
            <?php
            include 'top-bar.php';
            ?>
            <div class="add-form">
                <h3 class="heading">Edit Blog</h3>
                <div class="form-container">
                    <form action="" method="POST" onsubmit="return validateBlog(false)" enctype="multipart/form-data">
                        <div class="form-input">
                            <label for="name">Blog Title</label>
                            <input type="text" name="name" id="b-name" value="<?php echo $row['title'] ?>" />
                            <p class="error" id="b-name-error"></p>
                        </div>
                        <div class="form-input">
                            <label for="category">Category</label>
                            <br>
                            <select name="category" id="b-category">
                                <option value="">Select Category</option>
                                <?php
                                include '../connect.php';
                                $sql1 = 'SELECT * FROM blogCategories';
                                $result1 = mysqli_query($conn, $sql1);
                                if ($result1) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo "<option value='" . $row1['id'] . "' " . (($row['categoryId'] == $row1['id']) ? "selected" : "") . ">" . $row1['name'] . "</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <p class="error" id="b-category-error"></p>
                        </div>
                        <div class="form-input">
                            <label for="description">Description</label>
                            <textarea name="description" id="b-description" rows="5"><?php echo $row['description'] ?></textarea>
                            <p class="error" id="b-description-error"></p>
                        </div>
                        <div class="form-input">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="b-image" />
                            <p class="error" id="b-image-error"></p>
                        </div>
                        <button type="submit" class="btn-submit" id="">Submit</button>
                        <p class="success"> <?php echo $Msg ?></p>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="admin-script.js"></script>
</body>

</html>


