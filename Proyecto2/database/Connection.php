<?php
/*@author Claret*/
interface Connection {
    public static function open();

    public static function close();

    public static function query($query);

    public static function get_row_array($resultset);
    
     public static function get_fetch_array($resultset);

    public static function execute($query);

    public static function get_connection();
}
