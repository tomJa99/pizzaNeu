<?php

class Impressum extends Seite implements ISeite
{
    public function output(): string
    {
        $html = "
          <html>
          <head><title>Impressum</title></head>
		  
          <body>
          <h1>Salvatores Pizza-Express: Impressum</h1>
          
          
          
          <p><a href='index.php'>Zurück</a></p>
          
		  </body>
          </html>
        ";

        return $html;
    }
}