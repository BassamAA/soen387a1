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
		      <?php
		        //  extract( $_POST );
				$ID = $_POST["ID"];
				$FirstName = $_POST["FirstName"];
				$LastName = $_POST["LastName"];
				$Address = $_POST["Address"];
				$PhoneNumber = $_POST["PhoneNumber"];
				$DateOfBirth = $_POST["DateOfBirth"];
				$Email = $_POST["Email"];
				// $Password = $_POST["Password"];

		
		         // build INSERT query
		      
				//  $query="INSERT INTO Student (ID,FirstName,LastName,Address,Email,PhoneNumber, DateofBirth)
				//  VALUES ('$ID','$FirstName','$LastName','$Address','$Email','$PhoneNumber,'$DateOfBirth')";
				 
				 $query="INSERT Student SET ID='$ID',FirstName='$FirstName', LastName='$LastName', 
				 Address='$Address', Email='$Email', PhoneNumber='$PhoneNumber', DateOfBirth='$DateOfBirth' ";
				
		         if ( !( $database = mysqli_connect( "localhost",
		            "root", "wrgWM3K52n8fk3mC" ) ) )                      
		            die( "Could not connect to database </body></html>" );
		   
		         // open Student database
		         if ( !mysqli_select_db( $database ,"University" ) )
		            die( "Could not open University database </body></html>" );
		     
		
					$query = "SELECT " . "*" . " FROM Student";
		         // query Student database
		         if ( !( $result = mysqli_query( $database,$query) ) ) 
		         {
		            print( "Could not execute query! <br />" );
		            die( mysqli_error() . "</body></html>" );
		         } // end if
				else
				{
				print("You were succesfully registered");

				}

				// $result = mysqli_query($database,$query);

				// while ( $rows = $result->fetch_assoc() ) {
				// 	print_r($rows);//echo "{$row['field']}";
				// }

				$db = new mysqli('localhost','root','wrgWM3K52n8fk3mC','University');
				foreach ( $db->query('SELECT * FROM Student') as $row ) {
					print_r($row);//echo "{$row['field']}";
					echo $row;
				}
				$db->close();


		         mysqli_close( $database );
		      ?><!-- end PHP script -->
		      
		   </body>
		</html>
