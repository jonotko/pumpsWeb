<?php //functions.php

    require_once("login.php");
    
    function database_connect($dbhost, $dbuser, $dbpass, $dbname){
        mysql_connect($dbhost, $dbuser, $dbpass) or                 die("Unable to connect to database".mysql_error());
        mysql_select_db($dbname) or die("Unable to select           database".mysql_error());
    }
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exist.<br/>";
}


function queryMysql($query)
{
    $result = mysql_query($query) or die("UNSUCCESSFUL QUERY".mysql_error());
    return $result;
}
    

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

function destroySession()
{
    $_SESSION = array();
    
    if(session_id() != "" || isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-2592000, '/');
    }
    session_destroy();
}

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("$template"))
        {
            // extract variables into local scope
            extract($values);
            
            // render header
            require("../templates/header.php");

            // render template
            require("../templates/$template");

        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

?>
