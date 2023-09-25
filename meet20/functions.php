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
    move_uploaded_file($tmpName, $uploadDir . $newFileName);
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

//regist
function regist($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //check username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username has been registered!!!');
        </script>";

        return false;
    }

    //confirmation password
    if ($password !== $password2) {
        echo "<script>
            alert('Passwords do not match!!');
        </script>";

        return false;
    }

    //encryption password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    //adding user into database

    mysqli_query($conn, "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');");


    return mysqli_affected_rows($conn);
}

//regist button

function registButton(){
    global $conn;
    if (isset($_POST['register'])) {
        if (regist($_POST) > 0) {
            echo "<script>
                        alert('New user has been added!!!')
                    </script>";
        }else{
            echo mysqli_error($conn);
        }
    }
}

// login
function login(){

    global $conn;
        //check cookies
        if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];
    
            //take username by id
            $result = mysqli_query($conn,"SELECT userId FROM users WHERE userId = '$id'");
            $row = mysqli_fetch_assoc($result);
    
            //check cookie and username
            if($key === hash('sha256', $row['username'])){
                $_SESSION['login'] = true;
            }
        }
    
        //check session
        if(isset($_SESSION["login"])){
            header("Location:index.php");
            exit;
        }
    
        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
        
            $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
        
            //username check
            if (mysqli_num_rows($result) === 1) {
                //check password
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row["password"])) {
                    
                    //set session
                    $_SESSION["login"] = true;
    
                    //check remember
                    if(isset($_POST['remember'])){
                        //make cookie
                        setcookie('id',$row['userId'],time()+60);
                        setcookie('key',hash('sha256',$row['username']),time()+60);
                    } 
                    header("Location: index.php");
                    exit;
                }
            }
            $error = true;
        }
}

