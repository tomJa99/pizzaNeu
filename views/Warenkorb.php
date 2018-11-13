<?php

class Warenkorb extends Seite implements ISeite
{

    public function output(): string
    {
        //var_dump($_SESSION['warenkorb']);

        $title = "Warenkorb";
        $subtitle = "Ihre Auswahl unserer Spezialitäten:";
        $content = "";

        foreach ($_SESSION['warenkorb'] as $product)
        {
            $content.= $product . "<br>";
        }
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