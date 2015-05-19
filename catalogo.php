<html>
<HEAD>
	<TITLE>I nostri prodotti</TITLE>
</HEAD>
<BODY>
	<!--il primo div si occuperà di mostrare la parte inerente a i nuovi
	gusti inseriti, e dentro ad esso ci sarà la possibilità di vedere il
	catalogo completo dei prodotti-->
	<div id="uno">
	  <?php
	  	/*Primo if si attiva dopo aver cliccato sul tasto per visionare l'elenco
	  	completo dei prodotti*/ 
	    if ((isset($_POST"submit"))) {
	    	//creazione collegamento al database
	    	$collegamento="mysql:host=ironwolf90.mynetgear.com;port=3306;dbname=sitogelateria";
	    	 //creazione del PDO
	    	 $db= new PDO ($collegamento, "ice","cream");
	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	  $sql="SELECT nome,tipo_foto,dati_foto,descrizione FROM catalogo";
	    	   //stampa a video dei risultati
	    	   foreach ($db->query($sql) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		echo $row['tipo_foto']." ".$$row['dati_foto']." ".$row['nome'];
	    	}
	    }
	    /*ELSE si attiva all'entrata sulla pagina e farà visionare i nuovi 
	    prodotti, in particolare gli ultim 3 prodotti*/
	    else{
	    	//creazione collegamento al database
	    	$collegamento="mysql:host=151.63.77.13;port=3306;dbname=sitogelateria";
	    	 //creazione del PDO
	    	 $db= new PDO ($collegamento, "ice","cream");
	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	  $sql="SELECT nome,tipo_foto,dati_foto,descrizione FROM catalogo 
	    	     	  ORDER BY desc() LIMIT 3";
	    	   //stampa a video dei risultati
	    	   foreach ($db->query($sql) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		echo $row['tipo_foto']." ".$$row['dati_foto']." ".$row['nome'];
	    	}?>
	    	<!--Form che permette di visionare il catalogo completo dei prodotti
	    	e che premuto attiverà il primo IF-->
	    	<form method="post" action="<?php $PHP_SELF ?>">
	    		<input type="submit" value="Catalogo completo" name="submit" id="submit">
	    	</form>
	    }
		
	</div>
	<div id="due">
	 <!--Questo div si occuperà della parte inerente la ricerca di un gusto
	 in particolare, attraverso l'utilizzo di una barra di ricerca, con la 
	 presenza di un tasto che permette la selezione di un gusto a caso-->
	 <?php
	 $key=$_GET['key'];
	  	/*Primo if si attiva dopo aver cliccato sul tasto per la ricerca*/ 
	    if ((isset($_POST"submit"))) {
	    	//creazione collegamento al database
	    	$collegamento="mysql:host=ironwolf90.mynetgear.com;port=3306;dbname=sitogelateria";
	    	 //creazione del PDO
	    	 $db= new PDO ($collegamento, "ice","cream");
	    	  //creazione della query SELECT per visualizare i risultati
	    	  $sql="SELECT nome,tipo_foto,dati_foto,descrizione FROM catalogo 
	    	  WHERE nome LIKE "%'$key'%" OR descrizione LIKE "%'$key'%"";
	    	   //stampa a video dei risultati
	    	   foreach ($db->query($sql) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		echo $row['tipo_foto']." ".$$row['dati_foto']." ".$row['nome'];
	    	}
	    }
	    /*ELSE si attiva all'entrata sulla pagina e verranno visualizzati
	    la barra di ricerca e il tasto del gelato fortunato*/
	    else{
	    	}?>
	    	<!--Form che permette di scrivere la parola da ricercare, 
	    	tasto di ricerca più gelato fortunato-->
	    	<form method="get" action="<?php $PHP_SELF ?>">
	    		<input type="text" name="key">
	    		 <input type="submit" value="Catalogo completo" name="submit" id="submit">
	    		  <input type="button" value="Tenta la fortuna" name="lucky" id="lucky">
	    	</form>
	    }

	</div>
	<div id="tre">
		
	</div>
</BODY>