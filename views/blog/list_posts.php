<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mon Premier Blog PHP</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= SCRIPTS . 'vendor/bootstrap/css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css'?>" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'freelancer.min.css'?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= SCRIPTS . 'vendor/font-awesome/css' . DIRECTORY_SEPARATOR . 'font-awesome.min.css'?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top">Mon Premier Blog PHP</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="/my-first-php-blog">Accueil</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/my-first-php-blog/posts">Articles</a>
                        </li>
                        <?php if (isset($_SESSION['auth'])): ?> <!-- si connecté -->
                        <li class="page-scroll">
                            <a href="/my-first-php-blog/admin/posts">Partie admin</a>
                        </li>
                        <?php endif ?>
                        <?php if (!isset($_SESSION['auth'])): ?>  <!-- si déconnecté -->
                        <li class="page-scroll">
                            <a href="/my-first-php-blog/register">Inscription</a>
                        </li>
                        <li class="page-scroll">
                            <a href="/my-first-php-blog/login">Connexion</a>
                        </li>
                        <?php endif ?>
                        <?php if (isset($_SESSION['auth'])): ?> <!-- si connecté -->
                        <li class="page-scroll">
                            <a href="/my-first-php-blog/logout">Se déconnecter</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Les articles</h2>
                        <hr class="star-primary">
                    </div>
                    <?php foreach($params['posts'] as $post): ?>
                        <h2><?= $post->title ?></h2>
                        <small>Publié le <?= $post->getCreationDate() ?></small>
                        <p><?= $post->chapo ?></p>
                        <p><?= $post->content ?></p>
                        <a href="/my-first-php-blog/posts/<?= $post->id ?>" class="btn btn-primary">Lire plus</a>
                    <?php endforeach ?>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Location</h3>
                            <p>3481 Melrose Place
                                <br>Beverly Hills, CA 90210</p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Around the Web</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>About Freelancer</h3>
                            <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; Your Website 2016
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- jQuery -->
        <script src="<?= SCRIPTS . 'vendor/jquery' . DIRECTORY_SEPARATOR . 'jquery.min.js'?>"></script>
        

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= SCRIPTS . 'vendor/bootstrap/js' . DIRECTORY_SEPARATOR . 'bootstrap.min.js'?>"></script>
        
        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jqBootstrapValidation.js'?>"></script>
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'contact_me.js'?>"></script>


        <!-- Theme JavaScript -->
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'freelancer.min.js'?>"></script>

    </body>

</html>