<?php
	require "gshop_db.inc.php";
	require "gshop_lib.inc.php";

	if($_FILES['poster']['size'] > 0) {
		$poster_path = posterValidation($_FILES["poster"], 10000000);
		echo '<script>
				var imgOutput = parent.window.document.getElementById("miniPoster");
				var posterPost = parent.window.document.getElementById("poster_post");
				imgOutput.innerHTML = "<img src='.$poster_path.'>";
				posterPost.value = "'.$poster_path.'";
			</script>';
	}
?>