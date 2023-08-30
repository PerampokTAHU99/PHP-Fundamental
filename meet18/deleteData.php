<?php
require 'session.php';
require 'functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
                alert('Data Deleted!!!');
                document.location.href = 'index.php';
                </script>
                ";
} else {
    echo "
                <script>
                alert('Data not Deleted');
                document.location.href = 'index.php';
                </script>
                ";
}
?>