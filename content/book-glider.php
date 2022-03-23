	<?php
		$conn = new mysqli("localhost", "root", "", "ia2") or die(mysqli_error($conn));
		$sql = "SELECT `bookid`, `title`, `author`, `year`, `genre`, `imagePath` FROM `bookdata`";
		$result = $conn->query($sql);
	?>
	<div class="row">
		<div class="col-8 no-padding">
			<div class="glide">
				<!-- ---------------  Slider  ---------------- -->
				<div class="glide__track" data-glide-el="track">
					<ul class="glide__slides">			
					<?php	
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) { ?>
						<div style="margin:10px">
							<li class="glide__slide">
								<p class="book-heading"><?php echo $row["author"]; ?> - <?php echo $row["year"]; ?></p>
								<img 
									alt="<?php echo $row["author"]; ?> - <?php echo $row["year"]; ?> - <?php echo $row["genre"]; ?>"
									src="<?php echo $row["imagePath"]; ?>">
							</li>
						</div>
					<?php }} ?>
					</ul>
				</div>
				<!-- ---------------  Controls  ---------------- -->
				<div class="glide__arrows" data-glide-el="controls">
					<button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
					<button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
				</div>
			</div>
		</div>
		<?php require 'search-panel.php'; ?>
	</div>

<?php $conn->close(); ?>