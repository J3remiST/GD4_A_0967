<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $phonenum = $_POST['phonenum'];
        $membership = $_POST['membership'];

        // Check Unik Phonenum 
        $check_phonenum=mysqli_num_rows(mysqli_query($con, "SELECT phonenum FROM users WHERE phonenum='$phonenum'"));

            if ($check_phonenum > 0) {
                echo
                '<script> alert("Phone number sudah digunakan. Masukan Phone number baru.");
                window.location = "../page/registerPage.php"<script>';
            }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO users(email, password, name, phonenum, membership)
                VALUES
            ('$email', '$password', '$name', '$phonenum', '$membership')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankanditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Register Success");
                window.location = "../index.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Register Failed");
                </script>';
        }

    }else{
        echo
                '<script>
                window.history.back()
                </script>';
    }
?>
