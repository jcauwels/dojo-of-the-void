<?php 
    $title="L5R Dojo: Sign Up"; //set title of page
    $css = ['form']; //extra css files needed
    require 'includes/header.php'; //include header template
    
    //FORM PROCESSING
    
    //Validation
    if (filter_has_var(INPUT_POST, "submit")) { //run validation & update if form value has been submitted
        //Cleanse Data
        if (filter_has_var(INPUT_POST, "username")) {$username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING);}
        if (filter_has_var(INPUT_POST, "first_name")) {$firstname = filter_input(INPUT_POST,"first_name",FILTER_SANITIZE_STRING);}
        if (filter_has_var(INPUT_POST, "last_name")) {$lastname = filter_input(INPUT_POST, "last_name",FILTER_SANITIZE_STRING);}
        if (filter_has_var(INPUT_POST, "email")) {$email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL);}
        if (filter_has_var(INPUT_POST, "password")) {$password = password_hash($_POST['password'],PASSWORD_DEFAULT);}
        if (filter_has_var(INPUT_POST, "confirm")) {$confirm = password_verify($_POST['confirm'],$password);}
        //Validate form data
        $error=[]; //set up empty array for error messages
        //username must be unique
        
        if(!$username) {
            $error[] = "You must provide a username";
        } else {
            $query="SELECT * FROM users WHERE username='$username';";
            $result = $mysqli->query($query);
            $check = $result->num_rows;
            if ($check >= 1) {
                $error[] = "That username is already in use. Please select another";
            }
        } //end username validation
        
        if (password_verify('',$password)) { //verify password exists
            $error[] = "You must provide a password";
        } else if (!$confirm) { //verify that password & confirm fields match
            $error[] = "Password and Confirm fields must match.";
        } //end password validation
        
        if (!$firstname) { //verify first name exists
            $error[] = "Please provide a first name. It doesn't need to be real.";
        } //end first name validation
        
        if (!$lastname) { //verify last name exists
            $error[] = "Please provide a last name. It doesn't need to be real.";
        } //end first name validation
        
        if (!$email) {
            $error[] = "Email not provided or invalid format";
        }
        
    }//end validation & update
?>
<h2>Welcome!</h2>
<p>To sign up, please provide the following information:</p>
<?php
    if ((isset($error)) && ($error)) {
        foreach ($error as $value) {
            echo '<p class="error">'.$value.'</p>';
        }
    }
?>
<form action="<?php echo filter_input(INPUT_SERVER,"PHP_SELF",FILTER_SANITIZE_SPECIAL_CHARS); ?>" method="post">
    <p><label for="username">Username:</label><input type="text" name="username" value="<?php if (isset($username)) {echo $username;} ?>"></p>
    <p><label for="password">Password:</label><input type="password" name="password"></p>
    <p><label for="confirm">Confirm Password:</label><input type="password" name="confirm"></p>
    <p><label for="first_name">First Name:</label><input type="text" name="first_name"></p>
    <p><label for="last_name">Last Name:</label><input type="text" name="last_name"></p>
    <p><label for="email">Email:</label><input type="text" name="email"></p>
    <p><label for="clan">Clan:</label><select id="clan">
            <option value="crab">Crab</option>
            <option value="crane">Crane</option>
            <option value="dragon">Dragon</option>
            <option value="lion">Lion</option>
            <option value="mantis">Mantis</option>
            <option value="phoenix">Phoenix</option>
            <option value="scorpion">Scorpion</option>
            <option value="spider">Spider</option>
            <option value="unicorn">Unicorn</option>
            <option value="unaligned" selected>Unaligned</option>
        </select>
    <p class="buttonRow"><input type="submit" name="submit" value="Sign Up"></p>
</form>
<?php require 'includes/footer.php';