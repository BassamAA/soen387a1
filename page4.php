<!-- PHP file used to create new student -->

<!DOCTYPE html>
		<html xmlns = "http://www.w3.org/1999/xhtml">
		   <head>
		      <title>Search Results</title>
		   <style type = "text/css">
		         body  { font-family: arial, sans-serif;
		                 background-color: white } 
		         table { background-color: white }
		         td    { padding-top: 2px;
		                 padding-bottom: 2px;
		                 padding-left: 4px;
		                 padding-right: 4px;
		                 border-width: 1px;
		                 border-style: inset }
		      </style>
		   </head>
		   <body>
			<h1> Ok </h1>
		      <?php
		         extract( $_POST );
		
		         // build SELECT query
		      
				 $query="INSERT INTO Student (ID, FirstName, LastName, Address, Email, PhoneNumber, DateofBirth)
				 VALUES ('$ID','$FirstName','$LastName','$Address','$Email','$PhoneNumber,'$DateofBirth'')";
				 
				 
		         // Connect to MySQL
		         if ( !( $database = mysqli_connect( "localhost",
		            "root", "" ) ) )                      
		            die( "Could not connect to database </body></html>" );
		   
		         // open Products database
		         if ( !mysqli_select_db( $database ,"University" ) )
		            die( "Could not open University database </body></html>" );
		     
		
		
		         // query Products database
		         if ( !( $result = mysqli_query( $database,$query) ) ) 
		         {
		            print( "Could not execute query! <br />" );
		            die( mysqli_error() . "</body></html>" );
		         } // end if
				else
				{
				print("Course was successfully created");
				}
		         mysqli_close( $database );
		      ?><!-- end PHP script -->
		      
		   </body>
		</html>
