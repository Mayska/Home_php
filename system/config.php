<?php
class config{
    public static $mode = "dev"; // dev ou prod

    public static $bdd = array(
        'dev'  => array(
                'host'  =>  "localhost",
                'user'  =>  "root",
                'password'  =>"",
                'database'=> "mayska_bdd_home",
                'charset' => "utf8"
                    ),
        'prod' => array(
            'host'  =>  "mysql-mayska.alwaysdata.net",
            'user'  =>  "mayska",
            'password'  =>"Alex22v10",
            'database'=> "mayska_bdd_home",
            'charset' => "utf8"
            )
        );


}
?>
