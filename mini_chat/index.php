<!doctype html>

    <html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

        <title>Mini-Chat 😸</title>

    </head>

    <body>
    <div class="container">
        <div class="col-md-auto text-center">
            <div class="jumbotron bg-warning">
                <h1 class="display-4 text-white">Hello, <br> bienvenue dans ce mini-chat !</h1>
                <form action="pdo/store.php" method="post" onsubmit="storeMessage(event, this)">
                    <div class="form-group">
                        <label for="Pseudo">Pseudonyme</label>
                        <input type="text" class="form-control" name="nickname" placeholder="Entre ton pseudo !" value= <?= $_COOKIE['nickname'] ?? ''?>>
                        <small class="form-text text-muted">Écris sans réfléchir</small>
                    </div>
                    <div class="form-group">
                        <label for="Message">Ton message</label>
                        <input type="text" id="message" class="form-control" name="message" placeholder="Écris ton message !!!">
                        <small class="form-text text-muted">255 caractères max ! Abuses pas !</small>
                    </div>
                <button type="submit" class="btn btn-primary bg-danger">Post !</button>
            </form>
            </div>
        </div>
        <?php
        include 'pdo/message.php';
        ?>
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="js/minichat.js"></script>
    </body>

    </html>