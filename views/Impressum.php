<?php

class Impressum extends Seite implements ISeite
{
    public function output(): string
    {
        /*$html = "
          <html>
          <head><title>Impressum</title></head>
		  
          <body>
          <h1>Salvatores Pizza-Express: Impressum</h1>
          
          
          
          <p><a href='index.php'>Zurück</a></p>
          
		  </body>
          </html>
        ";
        */

        $title = "Impressum";
        $subtitle = "Verantwortlich für Text und Inhalt";
        $content = "<p>Salvatore .... bla bla blaa</p>";

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