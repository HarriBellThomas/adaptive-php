<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adaptive Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('css/preview.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="css/blog-home.css" rel="stylesheet"> -->
    <style>
    body { padding-top: 0 !important; background-color: #f9f9f9; }
    </style>
</head>
<body>
    <!-- Page Content -->
    <div class="container" style="max-width: 500px;">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <h1 class="my-4">Preview<br>
                    <small>Subtitle</small>
                </h1>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="{{url('images/preview/1.jpg')}}">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                        <p>Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary" onclick="return clicked(this);">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#" onclick="return clicked(this);">Adaptive</a>
                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="{{url('images/preview/2.jpg')}}">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                        <p>Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary" onclick="return clicked(this);">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#" onclick="return clicked(this);">Adaptive</a>
                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="{{url('images/preview/3.jpg')}}">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                        <p>Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" onclick="return clicked(this);" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#" onclick="return clicked(this);">Adaptive</a>
                    </div>
                </div>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#" onclick="return clicked(this);">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" onclick="return clicked(this);">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <script src="https://js.adaptive.org.uk/adaptive.js?<?php echo time(); ?>"></script>
    <script type="text/javascript">
    function clicked(node) {
        confirm("Link clicked.");
        return false;
    }
    </script>

</body>
</html>
