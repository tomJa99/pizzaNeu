<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05.11.18
 * Time: 13:55
 */

class Produktliste extends Seite implements ISeite
{
    public function output(): string
    {
        //kein SQL in Views

        $title = "Online-Shop";
        $subtitle = "Bestellen Sie Ihre Lieblingspizza online";
        $content = "<table class = 'table table-striped'><th>Name</th><th>Zutaten</th><th>Preis</th><th></th>";

        $products = $this->model->getAllProducts();

        foreach ($products as $row)
        {
            $beschreibung = "";
            $word = str_word_count($row['beschreibung'], 1, ',äüö');
            for ($i = 0; $i < 5; $i++)
            {
                $beschreibung = $beschreibung . " " . $word[$i];
            }
            $content .= "<tr><td>" . strtoupper($row['name']) . "</td><td>" . $beschreibung . "...</td><td>" . number_format($row['preis'], 2, ",", ".") . "</td><td><a href='?page=Warenkorb&action=addProduct&actionValue={$row['id']}'><span class='glyphicon glyphicon-shopping-cart'></span></a></td></tr>";
        }

        $content .= "</table>";
        $content .= "<p><a href='?page=Produktliste&action=setOrder&actionValue=name'>Nach Name sortiert zeigen</a></p>";
        $content .= "<p><a href='?page=Produktliste&action=setOrder&actionValue=preisA'>Nach Preis aufsteigend sortiert zeigen</a></p>";
        $content .= "<p><a href='?page=Produktliste&action=setOrder&actionValue=preisD'>Nach Preis absteigend sortiert zeigen</a></p>";

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