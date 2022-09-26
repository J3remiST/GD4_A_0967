<?php
 include '../component/sidebar.php'
?>
 <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);" >

    <div class="body d-flex justify-content-between">
        <h4>LIST SERIES</h4>
    </div>
    <hr>
        <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Genre</th>
                <th scope="col">Release</th>
                <th scope="col">Episode</th>
                <th scope="col">Season</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM series") or
die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_assoc($query)){
                echo'
                <tr>
                    <th scope="row">'.$no.'</th>
                    <td>'.$data['name'].'</td>
                    <td>'.$data['genre'].'</td>
                    <td>'.$data['realease'].'</td>
                    <td>'.$data['episode'].'</td>
                    <td>'.$data['season'].'</td>
                    <td>

                    <a href="../page/editMoviePage.php?id='.$data['id'].'"> 
                                <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fa-solid fa-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg>
                            </a>
                        <a href="../process/deleteMovieProcess.php?id='.$data['id'].'"
onClick="return confirm ( \'Are you sure want to delete this
data?\')">                        <i style="color: red" class="fa fa-trash fa-2x"></i>
                        </a>

                        
                    </td>
                    
                </tr>';
                $no++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>