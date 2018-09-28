<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	function senddata(count) {
		count = count;
		$.ajax({
			type: "POST",
			url: "asses.php",
			data: { count : count},
			success: function(data){$('#mark_main').html(data)}
		})
	};
</script>