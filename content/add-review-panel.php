<div class="display-box banner-title col-12">
	<h1>Add Review</h1>
	<form action="addreview.php" method="GET">
		<div class="row">
			<div class="col-6">
				<h4>Write a review</h4>
				<textarea rows=5 cols=100 class="basic-field"  type="text" name="review" required> </textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<h4>Select your rating</h4>
				<input class="basic-field"  type="number" name="rating" min="1" max="5" required />
				<input class="basic-submit mt-10" type="submit" value="Review!" />
			</div>
		</div>			
	</form>
</div>		