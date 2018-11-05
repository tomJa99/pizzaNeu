<?php

class Sonderangebot extends Seite implements ISeite
{

    public function output(): string
    {
        //kein SQL in Views
        $angebot = $this->model->getSpecialOffer();
        $sonderpreis = $this->controller->calcSpecialOfferPrice($angebot['preis']);
        $sonderpreis *= $this->model->currencyRate;
        $angebot['preis'] *= $this->model->currencyRate;

        $title = "Sonderangebot";
        $subtitle = "Das heutige Angebot";
        $content = "<p>Heute: Pizza {$angebot['name']} statt " . number_format($angebot['preis'], 2, ',', '.') . " {$this->model->currencySymbol} heute nur $sonderpreis {$this->model->currencySymbol}</a></p>  ";

        //aktiviert die Ausgabepufferung - "echo wird nicht ausgegeben"

        ob_start();
        require "templates/default.php";
        // Ausgabepuffer auslesen
        $html = ob_get_contents();
        //deaktiviert die Ausgabepufferung
        ob_end_clean();

        return $html;
    }

}