<?php

ini_set('display_errors', 'on');
$db = new PDO('mysql:host=127.0.0.1:3306;dbname=test', 'root', 'root');
if (!empty($_POST)){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = $db->prepare("
        INSERT INTO users (first_name, last_name, email, password)
        VALUES (:first_name, :last_name, :email, :password)
    ");
    
    $user->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => $password,
    ]);    
}
?>
<!DOCTYPE httml>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration/ Log in page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <form action="index.php" method="post" autocomplete="off">
            <input type="text" name="first_name" placeholder="First name"> 
            <br>
            <input type="text" name="last_name" placeholder="Last name"> 
            <br>
            <input type="email" name="email" placeholder="Email"> 
            <br>
            <input type="password" name="password" maxlenght="20" placeholder="Password"> 
            <br>
            <input type="submit" value="Register">
        </form>
        <!-- Style part-->
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                <form>
                    <div class="form-row">
                      <div class=" mb-3">
                        <label for="validationServer01">First name</label>
                        <input type="text" class="form-control is-invalid" id="validationServer01" placeholder="First name"  required>
                        <div class="invalid-feedback">
                          Choose a name
                        </div>
                      </div>
                      
                    </div>
                    <div class="form-row">
                            <div class=" mb-3">
                                    <label for="validationServer02">Last name</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer02" placeholder="Last name"  required>
                                    <div class="invalid-feedback">
                                      choose sth
                                    </div>
                                  </div>
                                  
                    </div>
                    <div class="form-row">
                            <div class=" mb-3">
                                    <label for="validationServerUsername">Username</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                      </div>
                                      <input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                                      <div class="invalid-feedback">
                                        Please choose a username.
                                      </div>
                                    </div>
                                  </div>
                    </div>

                      <div class="col-md-3 mb-3">
                        <label for="validationServer04">State</label>
                        <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                        <div class="invalid-feedback">
                          Please provide a valid state.
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                        <label class="form-check-label" for="invalidCheck3">
                          Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
            </div>
        </div>
           

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>