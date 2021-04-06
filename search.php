<?php
     include 'header.php';
?>

<h1>Search Page</h1>

<style>
table, th, td{
                 border: 2px solid black;
                 background-color: lightblue;
				 
                 padding-top: 5px;
                 padding-right: 5px;
                 padding-bottom: 5px;
                 padding-left: 5px;
				 
				
				 
                 margin-top: 50px;
                 margin-bottom: 50px;
                 margin-right: 50px;
                 margin-left: 50px;
                 background-color: ;
				 
				
				 
				 
}
</style>


<div>
     <?php
            if(isset($_POST['submit-search'])){
				
            	$search = mysqli_real_escape_string($conn, $_POST['search']);
				


                $sql = "SELECT books.book_id, books.title, books.b_authors AS author, new_book_shop.price AS new_book_shop_price, new_book_shop.quantity AS new_book_shop_quantity, old_book_shop.price AS old_book_shop_price, old_book_shop.quantity AS old_book_shop_quantity, individual_seller.price AS individual_seller_price, individual_seller.quantity AS individual_seller_quantity, individual_seller.contact AS individual_seller_contact
FROM books
INNER JOIN new_book_shop
ON books.book_id = new_book_shop.book_id 
INNER JOIN old_book_shop
ON new_book_shop.book_id = old_book_shop.book_id 
INNER JOIN individual_seller
ON old_book_shop.book_id = individual_seller.book_id 
WHERE books.book_id IN (SELECT book_id
                      FROM books
                      WHERE books.title LIKE '%$search%')";


	
				
				
				
				
				
				
  
	
	
            	$result = mysqli_query($conn, $sql);
            	$queryResult = mysqli_num_rows($result);
                
			//	echo"There are ".$queryResult." results";
	

               	
   

				
		
				
				
				
				
				
				if($queryResult > 0){
                          echo "<table>
             						  <tr> 
									      <th>ID</th> 
										  <th>Title</th>
                                     	  <th>Authors</th>								  
										  <th>New Book Shop Price</th> 
										  <th>New Book Shop Quantity</th> 
										  <th>Old Book Shop Price</th> 
										  <th>Old Book Shop Quantity</th> 
										  <th>Individual Seller Price</th> 
										  <th>Individual Seller Quantity</th>
										  <th>Individual Seller Conatct</th>
									 </tr>";
                                     // output data of each row. Alias name goes here $row[....]
                                     while($row = mysqli_fetch_assoc($result)){
                                                  echo "<tr>     
												            <td>" . $row["book_id"]. "</td>  
											   	            <td>" . $row["title"]. "</td> 
															<td>" . $row["author"]. "</td>
									   	                	<td>"  . $row["new_book_shop_price"]. "</td>    
															<td>"  . $row["new_book_shop_quantity"]. "</td>
												            <td>"  . $row["old_book_shop_price"]. "</td>     
															<td>"  . $row["old_book_shop_quantity"]. "</td>
												            <td>"  . $row["individual_seller_price"]. "</td>  
															<td>"  . $row["individual_seller_quantity"]. "</td>
															<td>"  . $row["individual_seller_contact"]. "</td>
															
												  </tr>"                 ;
                                     }
                          echo "</table>";
               } else {
                       echo "0 results";
                }
				
				
            }
     ?>
</div>