<!DOCTYPE html>

<html>

<head>

<meta name="_token" content="{{ csrf_token() }}">



<title>Live Search</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>

<body>

<div class="container">

	<div class="row">




				<div class="form-group">

				<input type="text" class="form-control" id="search" name="search"></input>

				</div>


			  <div id="product_list"></div>

			</div>

</div>




<script>
	
	$(document).ready(function(){
		$('#search').on('keyup',function(){
			var value = $(this).val();
			if (value != '') 
			{
				$.ajax({

					type: 'get',

					url : '{{URL::to('search')}}',

					data:{'search':value},

					success:function(data){
					$('#product_list').fadeIn();
					$('#product_list').html(data);

					}
				})
			}
		});

		$(document).on('click','li',function(){
			$('#search').val($(this).text());
			$('#product_list').fadeOut();
		});

	});
</script>

<script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>

</body>

</html>