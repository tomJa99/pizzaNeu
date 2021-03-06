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
            
          <p>Zum aktuellen <a href='?page=Sonderangebot'>Sonderangebot in EUR</a></p>
          
          <p>Zum aktuellen<a href='?page=Sonderangebot&action=setCurrency&actionValue=USD'>Sonderangebot in USD</a></p>  
          
          <p>Zu unseren <a href='?page=Produktliste'>Spezialitäten</a></p>
          
          <p>Zum <a href='?page=Impressum'>Impressum</a></p>  
            
		  </body>
          </html>
        ";

        return $html;
    }
}