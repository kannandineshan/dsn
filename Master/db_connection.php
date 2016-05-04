<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 23:46
 */

    //Connection to our database that can be "included" in every file necessary
    $db = new MySQLi(
        'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
        'b35e94884f471c', //username for connecting to database
        '90efdea3', //user's password
        'befriendachildtestDB' //database being connected to
    );

    //PS: every file this is implemented in will bring up the first mention of $db as an ERROR, yet the code works without issues
    //It says it doesn't know $db, but heck, it does.

?>