<!DOCTYPE html>
<html>
    <head>
        <title>Example with Eloquent ORM in PHP</title>
         <meta name="author" content="lluis at manies point cat">
    </head>
    <body>
        <h2>Character Sets</h2>
        <ul>
<?php

        // ** ONLY FOR THIS EXAMPLE ---------------------------------------------------------------
        //    Changing the default database name defined in .env file
        $_ENV['MYSQL_DATABASE'] = "information_schema";
        // ** ONLY FOR THIS EXAMPLE ---------------------------------------------------------------

        require "../app/bootstrap.php";

        use App\Models\CharacterSet;


        $charsets = CharacterSet::all();

        foreach($charsets as $charset) {
            echo "<li><b>" . $charset->CHARACTER_SET_NAME . "</b> (" . $charset->DESCRIPTION . ")</li>";
        }
?>
        </ul>
    </body>
</html>
