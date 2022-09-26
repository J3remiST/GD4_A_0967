<?php
include '../component/sidebar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; width: 100%; justify-content: center; margin-top: 20px;">
        <div style="width: 80%; padding: 5px; border: 1px solid black; height: 100%;">
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <h3>Edit MOVIE</h3>
                <?php
                    $id = $_GET['id'];
                    echo
                    '
                        <p>'.$id.'</p>
                    '
                ?>
            </div>
            <hr>
            <form action="../process/editMovieProcess.php" method="post">
                <?php
                    $id = $_GET['id'];
                    $query = mysqli_query($con, "SELECT * FROM movies WHERE id='$id.'");
                    while($data = mysqli_fetch_assoc($query)){
                        echo
                        '
                        <div>
                        <p></p>
                            Id
                            <input class="form-control" id="id" name="id" aria-describedby="emailHelp" value='.$id.' readonly >
                        </div>

                        <div>
                        <p></p>
                            Name
                            <input class="form-control" id="name" name="name" aria-describedby="emailHelp" value='.$data['name'].' >
                        </div>

                        <div>
                        <p></p>
                            <label for="exampleInputEmail1" class="formlabel">Genre</label>
                            <select class="form-select" aria-label="Default select example" name="genre[]" id="genre" multiple>
                                <option value="Sci-Fi">Sci-Fi</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Action">Action</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </div>

                        <div>
                        <p></p>
                            release
                            <input class="form-control" id="release" name="release" aria-describedby="emailHelp" value='.$data['release'].' >
                        </div>
                        
                        <div>
                        <p></p>
                            Season
                            <input class="form-control" id="season" name="season" aria-describedby="emailHelp" value='.$data['season'].' >
                        </div>

                        <div>
                        <p></p>
                            Synopsis
                            <input class="form-control" id="synopsis" name="synopsis" aria-describedby="emailHelp" value='.$data['synopsis'].' >
                        </div>
                        ';
                    }
                ?>
                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>