<?php

class Sonderangebot extends Seite implements ISeite
{

    public function output() : string
    {
        $html = "
          <html>
          <head><title>Sonderangebot</title></head>
		  
          <body>
          <h1>Salvatores Pizza-Express</h1>
          <h2>Startseite</h2>
		  
          <p>Heute Pizza zum Sonderangebot</a></p>  
            
          <p><a href='index.php'>Zurück</a></p>
		  </body>
          </html>
        ";

        return $html;
    }

}