<?php
    session_start();
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id = $_POST['id'];
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $release = $_POST['release'];
        $season = $_POST['season'];
        $synopsis = $_POST['synopsis'];
        $kalimat = implode($genre);
echo $kalimat;
        

        $output="";
        $output2="";

        foreach ($genre as $oneGenre) {
            $output.= $oneGenre;
            $output.= ", ";
        }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con, "UPDATE `movies` SET `name`='$name',`genre`='$output',`release`='$release',`season`='$season',`synopsis`='$synopsis' WHERE `id`='$id'")
        or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if($query){
            echo
                '<script>
                alert("Update Movie Success");
                window.location = "../page/listMoviesPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Update Movie Failed");
                </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
}