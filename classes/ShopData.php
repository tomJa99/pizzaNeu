<?php
class ShopData
{
    private $link;

    function __construct()
    {
        $this->link = mysqli_connect("localhost", "root", "", "pizza")
        or die("DB Verbindung geht nicht: " . mysqli_error($this->link));
        mysqli_set_charset($this->link, "utf8");
    }

    public function getSpecialOffer()
    {
    	$temp['name']="Regina";
    	$temp['preis']=4.20;

    	$query ="SELECT name,preis FROM pizza WHERE sonderangebot=1";
    	$result = mysqli_query($this->link, $query);
    	$temp = mysqli_fetch_assoc($result);

    	return $temp;
    }
    
}