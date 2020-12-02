<?php
class user
{
    public $first_name;
    public $last_name;
    public $username;
    public $permission;

    function __construct($first_name, $last_name, $username, $permission) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->permission = $permission;
    }

    static function check_string($string_to_check)
    {
        if (preg_match("#&#", $string_to_check)) {
            return false;
        }
        return true;
    }
}