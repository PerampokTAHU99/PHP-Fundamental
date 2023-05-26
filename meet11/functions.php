<?php
    //connection database
    $conn = mysqli_connect("localhost", "root", "", "fundamental_php");

    //query
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }

    function addData($data){
        global $conn;

        $name = htmlspecialchars($data["name"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlspecialchars($data["email"]);
        $programStudy = htmlspecialchars($data["programStudy"]);
        $picture = htmlspecialchars($data["picture"]);

        $query = "INSERT INTO mahasiswa (name, nim, email, programStudy, picture)VALUES ('$name','$nim','$email','$programStudy','$picture')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    function editData($data){
        global $conn;
    }
?>