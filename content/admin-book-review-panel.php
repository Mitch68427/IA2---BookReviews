<?php	
		//Check & Set Search Term
		if (isset($_GET['searchterm'])){
			$search=$_GET['searchterm'];
		} else {
			$search="";
		}
		

		//Connect to Database
		$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
		
		//SQL command 
		$sql="SELECT bookId, title, author, year, genre FROM bookdata WHERE title LIKE '%"."$search"."%' 
		OR author LIKE '%"."$search"."%' LIMIT 20";
		
		$sqlBookReviews="SELECT bookReviews2.bookreviewid, bookdata.title, users.fullName, bookReviews2.rating, bookReviews2.review  
				 FROM users 
				 INNER JOIN bookReviews2 ON users.userId = bookReviews2.userId 
				 INNER JOIN bookdata ON bookReviews2.bookId = bookdata.bookId ";
		
		//Run SQL Command on Connected Databased
		$query = mysqli_query($conn,$sqlBookReviews);
		
		//Run the Print Functions
		print_table($query);
				
		//Print Function
		function print_table($query) {
			$numberOfRows = 0;
			$fields_num = mysqli_num_fields($query);
			echo("<div class='row book-table ml-50'>");
			for($i=0; $i<$fields_num; $i++) {
				$field = mysqli_fetch_field($query);
				echo("<div class='col-2 book-table-cell'><span>".$field->name."</span></div>");
			}
			echo '</div>';
			while($row = mysqli_fetch_row($query)) {
				$numberOfRows = $numberOfRows + 1;
				echo("<div class='row book-table ml-50'>");
				foreach($row as $key => $cell) {
					//Print Link instead of Number
					if ($key === array_key_first($row)) {
						echo("<div class='col-2 book-table-cell'><a href='deletereview.php?bookreviewid=".$cell."'>".$cell." (click to delete)</a></div>");
					} else{
						echo("<div class='col-2 book-table-cell'>".$cell."</div>");
					}
				}
				echo '</div>';
			}

			if($numberOfRows == 0){
				echo("<div class='row book-table ml-50'>");
				echo("<div class='col-10 book-table-cell'>No results found. Please search again.</div>");
				echo '</div>';
			}
		}
?>