<?php
class vinyl
{
    public $vinyl_name;
    public $artist_name;
    public $country;
    public $price;
    public $status;
    public $specificity;

    function __construct($vinyl_name, $artist_name, $price, $status, $specificity)
    {
        $this->vinyl_name = $vinyl_name;
        $this->artist_name = $artist_name;
        $this->price = $price;
        $this->status = $status;
        $this->specificity = $specificity; 
    }

    static function check_string($string_to_check)
    {
        if (preg_match("#&#", $string_to_check)) {
            return false;
        }
        return true;
    }
}