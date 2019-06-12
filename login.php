<?php
require "db.php";

$data = $_POST;
if( isset($data['do_login']) )
{
    $errors = array();
    $user = R::find('users', 'login = ?', array($data['login']) );
    if( $user )
    {
        //login exist
        if( password_verify($data['password'], $user->password) )

    } else
    {
        $errors[] = 'Password is incorrect!';
    } else{
        $errors[] = 'User with this login is not found';
    }

    if( ! empty($errors) )
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>

<!DOCTYPE="html">
<html lan="en">
    <body>
        <form action="login.php" method="POST">

          <p>
            <p><strong>First name</strong></p>
            <input type="text" name="login" value="<?php echo 
            @$data['login']; ?>">
          </p>

         <p>
          <p><strong>Password</strong></p>
          <input type="text" name="password" value="<?php echo 
          @$data['password']; ?>">
         </p>
          
          <p>
            <button type="submit" name="do_login">Sign in</button>
          </p>

        </form>
    </body>
</html>