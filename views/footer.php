<!-- @ start footer -->
	<footer> 
		<div class="custom-height25"> </div>
			<div id="err" class="error alert alert-danger close"> Error (check e-mail or empty message)</div>
			<div id="res" class="success alert alert-success close"> Success </div>
			<h4>Send comment</h4>

			<form action="" method="post" id="comment">
			  <div class="row">
				<div class="col">
				<label for="username">Name:</label>
				<input name="username" id="comment_name"  class="form-control" type="text" size="25" />
				</div>
				<div class="col">
				<label for="email">E-mail:</label>
				<input name="email"  id="comment_email" class="form-control" type="text" size="25" />
				</div>
			  </div>
			  <div class="row">
				<div class="col">
				<label for="message">Comment:</label>
				<textarea name="message" id="comment_text" class="form-control" cols="55" rows="5" maxlength="250"></textarea> 
				</div>
			  </div>
			
			  <input name="send" id="send" type="submit" class="btn btn-primary alignright" value="Comment" />
			</form>
		<div class="custom-height25"></div>
		<div class="custom-center"> <a href="javascript:scroll(0,0)" id="toTop">Go on Top</a> </div>
	</footer>
</div>
</body>
</html>