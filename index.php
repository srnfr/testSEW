<html>
<head>
<title>PHP Ping</title>
</head>
<body>

<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
    // Get input
    $target = $_REQUEST[ 'ip' ];

    ## Check validity of IP
    if (filter_var($target, FILTER_VALIDATE_IP)) {

    // Determine OS and execute the ping command.
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        // Windows
        $cmd = shell_exec( 'ping  ' . $target );
    }
    else {
        // *nix
        $cmd = shell_exec( 'ping  -c 4 ' . $target );
    }
        
    }

    // Feedback for the end user
    echo "<pre>Voici le resultat du ping vers : {$target}</pre>";
    echo "<pre>{$cmd}</pre>";
}

else {
    // Form
    echo '<form action="" method="post">';
    echo 'IP: <input type="text" name="ip" /><br />';
    echo '<input type="submit" name="Submit" value="Ping" />';
    echo '</form>';
}

?>

</body>
</html>

