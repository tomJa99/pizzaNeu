<?php

class Startseite extends Seite implements ISeite
{
    public function output(): string
    {
        $html = "
          <html>
          <head><title>Startseite</title></head>
		  
          <body>
          <h1>Salvatores Pizza-Express</h1>
          <h2>Startseite</h2>
		  
          <p>Willkommen auf der Website von Slavatores 
		  Pizza-Express - hier finden Sie hausgemachte 
		  Pizzas zu fairen Preisen.</p>
            
          <p>Zum aktuellen <a href='index.php?page=Sonderangebot'>Sonderangebot</a></p>  
            
		  </body>
          </html>
        ";

        return $html;
    }
}