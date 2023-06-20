<?php
//connection database
$conn = mysqli_connect("localhost", "root", "", "fundamental_php");

//query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function addData($data)
{
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $programStudy = htmlspecialchars($data["programStudy"]);

    //upload picture
    $picture = upload();
    if (!$picture) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (name, nim, email, programStudy, picture)VALUES ('$name','$nim','$email','$programStudy','$picture')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nameFile = $_FILES['picture']['name'];
    $sizeFile = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];

    //check upload picture

    if ($error === 4) {
        echo "
                <script>
                    alert('Pilih gambar terlebih dahulu');
                </script>
            ";
        return false;
    }

    // Specify the directory where you want to save the uploaded file
    $uploadDir = '/opt/lampp/htdocs/PHP-Fundamental/meet13/img';

    // file must a picture
    $extensionPictureValidation = ['jpg', 'jpge', 'png'];
    $extensionPicture = explode('.', $nameFile);
    $extensionPicture = strtolower(end($extensionPicture));
    if (!in_array($extensionPicture, $extensionPictureValidation)) {
        echo "
                <script>
                    alert('Yang anda upload bukan gambar!');
                </script>
            ";

        return false;
    }

    //check size files
    if ($sizeFile > 1000000) {
        echo "
                <script>
                    alert('Yang anda upload bukan gambar!');
                </script>
            ";
        return false;
    }

    //Generate name
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extensionPicture;

    // var_dump($_FILES);
    // die;

    //passed validation
    move_uploaded_file($tmpName,$uploadDir. $newFileName);
    return $newFileName;
}

function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function editData($data)
{
    global $conn;


    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $programStudy = htmlspecialchars($data["programStudy"]);
    $oldPicture = htmlspecialchars($data["oldPicture"]);

    //check user upload choose new picture or no
    if ($_FILES['picture']['error'] === 4) {
        $picture = $oldPicture;
    } else {
        $picture = upload();
    }

    $query = "UPDATE mahasiswa SET 
                name = '$name',
                nim = '$nim',
                email = '$email',
                programStudy = '$programStudy',
                picture = '$picture'
        WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function find($keyword)
{
    $query = "SELECT * FROM mahasiswa
            WHERE 
            name LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            programStudy LIKE '%$keyword%'
        ";
    return query($query);
}
