<?php

class ShopActions
{
    private $model;

    public function __construct(ShopData $model)
    {
        $this->model = $model;
    }

    public function __call($name, $arguments)
    {
        //TODO: Fehlermeldung
    }

    public function calcSpecialOfferPrice($euro)
    {
        return $euro * 0.8;
    }

    /*public function setCurrencyUSD()
    {
        $this->model->currencySymbol = "\$";
        $this->model->currencyRate = 1.14;
    }
    */
    public function setCurrency($currencySymbol = "EUR")
    {
        $this->model->currencySymbol = $currencySymbol;
        if ($currencySymbol == "USD")
        {
            $this->model->currencyRate = 1.14;
        }
        //if (... "CHF")...
    }

    public function setOrder($value)
    {
        if ($value == "name")
        {
            $this->model->listOrder = "ORDER BY name";
        }
        if ($value == "preisA")
        {
            $this->model->listOrder = "ORDER BY preis ASC";
        }
        if ($value == "preisD")
        {
            $this->model->listOrder = "ORDER BY preis DESC";
        }
    }

    public function addProduct($productNr)
    {
        //TODO $productNr ==""
        if (isset($_SESSION['warenkorb']))
        {
            $temp = $_SESSION['warenkorb'];
            $temp[] = $productNr;
        }
        else
        {
            $temp[0] = $productNr;
        }
        $_SESSION['warenkorb'] = $temp;
    }
}


