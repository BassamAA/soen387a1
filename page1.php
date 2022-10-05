<!-- PHP File used to enroll students in courses -->

<?php

$conn = new mysqli("localhost","root", "", "university");
$sql2 = "SELECT * FROM `Student`";
$result2 = $conn->query($sql2);

if (!$result2){
    die("Query Failed");
}

?>



<!DOCTYPE html>
		<html xmlns = "http://www.w3.org/1999/xhtml">
			<head>
				<title>Search Results</title>
			<style type = "text/css">
		        body  { font-family: arial, sans-serif;
		                background-color: #F0E68C } 
		         table { background-color: #ADD8E6 }
		         td    { padding-top: 2px;
		                 padding-bottom: 2px;
		                 padding-left: 4px;
		                 padding-right: 4px;
		                 border-width: 1px;
		                 border-style: inset }
		      </style>
		   </head>
		   <body>
		      <?php
		         extract( $_POST );
		
		         // build SELECT query
              $conn = new mysqli("localhost","root", "", "university");
              $query="INSERT INTO enrolledin (ID, Code)
				 VALUES ('$ID','$Code')";
				 
				 
		         // Connect to MySQL
		         if ( !( $database = mysqli_connect( "localhost",
		            "root", "" ) ) )                      
		            die( "Could not connect to database </body></html>" );
		   
		         // open Products database
		         if ( !mysqli_select_db( $database ,"university" ) )
		            die( "Could not open products database </body></html>" );


              $result = $conn->query($query);
              if (!$result2){
                  die("Query Failed");
              }// end if
				else
				{
				print("Succesfully registered to the class !");
				}

		     
		
		         // query Products database
//		         if ( !( $result = mysqli_query( $database,$query) ) )
//		         {
//		            print( "Could not execute query! <br />" );
//		            die( "mysqli_error()" . "</body></html>" );
//		         } // end if
//				else
//				{
//				print("Succesfully registered to the class !");
//				}
		         mysqli_close( $database );
		      ?><!-- end PHP script -->
		      
		   </body>
		</html>
