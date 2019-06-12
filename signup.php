<?php
require "db.php";

$data = $_POST;
if( isset($data['do_signup']) )
{
    //Registration
    
    $errors = array();
    if( trim($data['login']) == '' )
    {
        $errors[] = 'Enter your first name';
    }

    if( trim($data['login_2']) == '' )
    {
        $errors[] = 'Enter your last name';
    }

    if( trim($data['email']) == '' )
    {
        $errors[] = 'Enter a valid email address';
    }

    if( $data['password'] == '' )
    {
        $errors[] = 'Write your password! Password needs to be at least 8 characters long';
    }

    if( $data['password_2'] != $data['password'] )
    {
        $errors[] = 'These passwords are not equal!';
    }

    if( R::count('users', "email = ?", array($data['email'])) 
    > 0 )
    {
        $errors[] = 'User with this email address already exists';
    }

    if( empty($errors) )
    {
        //Everything is fine, register
        $user = R ::dispense('users');
        $user->login = $data['login'];
        $user->login_2 = $data['login_2'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'],
            PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;">You have signed up successfully!
        </div><hr>';
    } else
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>

<!DOCTYPE="html">
<html lan="en">
    <body>
        <form action="signup.php" method="POST">

          <p>
            <p><strong>First name</strong></p>
            <input type="text" name="login" value="<?php echo 
            @$data['login']; ?>">
          </p>

          <p>
            <p><strong>Last name</strong></p>
            <input type="text" name="login_2" value="<?php echo 
            @$data['login_2']; ?>">
          </p>

          <p>
            <p><strong>Email</strong></p>
            <input type="email" name="email" value="<?php echo 
            @$data['email']; ?>">
          </p>

          <p>
            <p><strong>Password</strong></p>
            <input type="password" name="password" value="<?php echo 
            @$data['password']; ?>">
          </p>

          <p>
            <p><strong>Repeat your password</strong></p>
            <input type="password" name="password_2" value="<?php echo 
            @$data['password_2']; ?>">
          </p>

          <p>
            <button type="submit" name="do_signup">Sign up</button>
          </p>

        </form>
    </body>
</html>