
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Tutor Login</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
            Tutor Login Portal!
        </nav>

        <div class="container">
            <div class="text-center mb-4">
                <h3>Login as Tutor</h3>
                <p class="text-muted">Complete the below form to Login into your Dashboard!</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="includes/login.inc.php" method="post" style="width: 50vw; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Name:</label>
                            <input type="text" class="form-control" name="tutor_name" placeholder="Tutor Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class ="form-label">Tutor Password:</label>
                            <input type="password" class="form-control" name="tutor_pwd" placeholder="Tutor Password">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="tutor_login_submit">Login</button>
                        <a href="../index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
    </body>
</html>