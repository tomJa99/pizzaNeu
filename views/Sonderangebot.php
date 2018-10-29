<?php

class Sonderangebot extends Seite implements ISeite
{

    public function output(): string
    {
        //kein SQL in Views

        $angebot = $this->model->getSpecialOffer();
        /*$html = "
                  <html>
                  <head><title>Sonderangebot</title></head>

                  <body>
                  <h1>Salvatores Pizza-Express: Sonderangebot</h1>
                  <h2>Startseite</h2>

                  <p>Heute: Pizza {$angebot['name']} zum Sonderangebot von ".number_format($angebot['preis'], 2, ',', '.')." €</a></p>

                  <p><a href='index.php'>Zurück</a></p>
                  </body>
                  </html>
        ";
        */

        $title = "Sonderangebot";
        $subtitle = "Das heutige Angebot";
        $content = "<p>Heute: Pizza {$angebot['name']} zum Sonderangebot von " . number_format($angebot['preis'], 2, ',', '.') . " €</a></p>  ";

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