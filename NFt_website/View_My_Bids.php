
<?php
session_start();
include 'connection.php';
include 'Header.php';
$Userid=$_SESSION['Userid'];

?>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>All Bids</h2>
					<?php
                    
$query="SELECT product.Proname,user.Username,status_bid.Status_name,bid.Bid_id,bid.Price,bid.Bid_date FROM bid INNER JOIN product ON bid.Pro_id = product.Proid INNER JOIN user ON bid.User_id = user.Userid INNER JOIN status_bid ON bid.Bid_status = status_bid.Status_id WHERE user.Userid =$Userid Order By Price  Desc";

$result = mysqli_query($conn,$query);
echo '<table border=1  Width=900px>';
echo '<tr>';
echo '<th>Product Name</th>';
echo '<th>Username</th>';
echo '<th>Status</th>';
echo '<th>Bid</th>';
echo '<th>Bid Date</th>';
echo '</tr>';
while($row=mysqli_fetch_array($result))
{
echo '<tr>';
echo '<td>'.$row['Proname'].'                    </td>';
echo '<td>'.$row['Username'].'                    </td>';
echo '<td>'.$row['Status_name'].'                     </td>';
echo '<td>'.$row['Price'].                            '</td>';
echo '<td>'.$row['Bid_date'].'                          </td>';
echo '</tr>';
}
echo '</table>';
                    ?>
				</div>
			</div>
		</div>
	
			</div>
		</div>
	</div>
</section>


<?php
include 'Footer.php';
?>