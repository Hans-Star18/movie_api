<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>Serch Film</title>
</head>

<body>
    <h1 class="text-center mt-5 mb-3">Search Movie</h1>

    <div class="container">
        <form action="" method="POST">
            <div class="row ">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search movie title" name="keyword"
                            id="keyword">
                        <input class="btn btn-outline-secondary" type="submit" name="submit" id="submit" value="Search">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="pagination" id="pagination"
                            placeholder="1 - <?=ceil($total_results / 10);?>">
                        <input class="btn btn-outline-secondary" type="submit" name="swich" id="swich" value="Swich">
                    </div>
                </div>
            </div>
            <?php if (!isset($error)): ?>
            <h4 class="mb-5">Movie Result : <?=$total_results;?></h4>
            <?php endif;?>
        </form>
        <hr>
    </div>

    <div class="container">
        <div class="row justify-content-center" id="movie-list">
            <?php if (isset($error)) {?>
            <div class="alert alert-danger" role="alert">
                <h3 class="text-center"><?=$error;?></h3>
            </div>
            <?php } else {?>
            <?php foreach ($movies as $movie): ?>
            <div class="col-md-3 ">
                <div class="card mb-3">
                    <img src="<?=$movie['Poster'];?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?=$movie['Title'];?></h5>
                        <p class="card-text">Relase year : <?=$movie['Year'];?></p>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <a href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#movieModal"
                                data-id="<?=$movie['imdbID'];?>">Detail</a>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php }?>
        </div>
    </div>

    <!-- Modal -->
    <div class=" modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="movieModalLabel">Movie Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assett/js/script.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>