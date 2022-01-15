$("#movie-list").on("click", ".see-detail", function () {
    // console.log($(this).data("id"));
    $.ajax({
        url: "http://www.omdbapi.com",
        type: "get",
        dataType: "json",
        data: {
            apikey: "4b6572b7",
            i: $(this).data("id"),
        },
        success: function (movie) {
            if (movie.Response == "True") {
                let rating = movie.Ratings[0];
                // console.log(rating);
                $(".modal-body").html(`                
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="${movie.Poster}" class="img-fluid">
                                <h5>Ratings : ${rating.Value}</h5>
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>${movie.Title}</h3></li>
                                    <li class="list-group-item">Released : ${movie.Released}</li>
                                    <li class="list-group-item">Director : ${movie.Director}</li>
                                    <li class="list-group-item">Actors : ${movie.Actors}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `);
            }
        },
    });
});
