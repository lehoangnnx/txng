<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Truy Xuất Nguồn Gốc - Chanh Dây</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="{{ asset('js/qrcode.min.js') }}"></script>
	<script type="text/javascript">
		function onReady()
		{
			var x = location.href
			var qrcode = new QRCode("id_qrcode", {
				text:x,
				width:100,
				height:100,
				colorDark:"#000000",
				colorLight:"#ffffff",
				correctLevel:QRCode.CorrectLevel.H
			});
		}
	</script>
	<style type="text/css" media="screen">
		.head {
			text-align:left;
			font-weight: bold;
			color: white;
			background-color: green;
		}
		h4 {
			color: white;
			font-weight: bold;
		}
		.imgInfo {
			float: right;
		}
		.w3-cell-row {
			padding: 20px;
		}
		.w3-cell {
			text-align: center;
			width: 50%;
			color: white;
		}
	</style>
</head>
<body onload=onReady()>
	<div class="w3-container w3-cell-row w3-light-green w3-hide-small" >
	  	<div class="w3-container w3-cell">
	  		<div id="id_qrcode" style="margin-right: auto;margin-left: auto; width: 100px"></div>
	  		<img src="{{ asset('img/core-img/logo.png') }}" style="width:30%">
	    	<h5><b>THINH AN TRADING CO.,LTD </b></h5>
	  	</div>
	</div>

	<div class="w3-container">


		<div id="ggmap" class="w3-container w3-sand">
		 	<button class="w3-btn w3-block w3-green w3-left-align"><h4>Trace Map</h4></button>
		 	<div id="map" class="w3-container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1250259416174!2d106.64427231417191!3d10.801735161681211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175294f4a21c7c5%3A0xad91d21cd0e4b7f3!2zOTMgQ-G7mW5nIEjDsmEsIFBoxrDhu51uZyAxMywgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1573110954038!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		 	</div>
		</div>

		<div id="info" class="w3-container w3-sand">
		  	<button onclick="myOpen('S7')" class="w3-btn w3-block w3-green w3-left-align"><h4>Traces Of The Product</h4></button>
		 	<div id="S7" class="w3-container w3-show">
			  <table class="w3-table w3-bordered">
			    <tr>
			      <th colspan=2 style="text-align:left;color: white;background-color: green;">Passion Fruit Juice</th>
			    </tr>
			    <tr>
			      <td>Product Code</td>
			      <td>{{ $product->product_name ?? '' }}</td>
			    </tr>
			    <tr>
			      <td>MFG</td>
			      <td>{{ $product->mfg ?? '' }}</td>
			    </tr>
			    <tr>
			      <td>EXP</td>
			      <td>{{ $product->exp ?? '' }}</td>
			    </tr>
			    <tr>
			      <td>Size</td>
			      <td>{{ $product->size ?? '' }}</td>
			    </tr>
			    <tr>
			      <td>Packing</td>
			      <td>{{ $product->packing ?? '' }}</td>
			    </tr>

				<tr>
			    	<td colspan="2" class="head">
					Production Company Infomation</td>
			    </tr>
				<tr>
			      	<td>Company name</td>
			      	<td>{{ $product->company_name ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Country</td>
			      	<td>{{ $product->country ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Representative</td>
			      	<td>{{ $product->representative ?? '' }}</td>
			    </tr>
				<tr>
			      	<td>Address</td>
			      	<td>{{ $product->company_address ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Cell phone</td>
			      	<td>{{ $product->cell_phone ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Email</td>
			      	<td>{{ $product->email ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Facebook</td>
			      	<td>{{ $product->fb ?? '' }}</td>
			    </tr>
			    <tr>
			    	<td colspan="2" class="head">
					Material Infomation - Planting area infomation</td>
			    </tr>
				<tr>
			      	<td>Farm name</td>
			      	<td>{{ $product->farm_name ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Address</td>
			      	<td>{{ $product->farm_address ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Growing area</td>
			      	<td>{{ $product->growing_area ?? '' }}</td>
			    </tr>
			    <tr>
			      	<td>Standard applied</td>
			      	<td>{{ $product->standard_applied ?? '' }}</td>
			    </tr>

			    <tr>
			    	<td colspan="2" class="head">
			    	{{ $product->description_header ?? '' }}</td>
			    </tr>
			    <tr>
			    	<td colspan="2">
			    	{{ $product->discription ?? '' }}
					</td>
			    </tr>
			  </table>
			</div>
		</div>


	  	<button onclick="myClose('S4')" class="w3-btn w3-block w3-green w3-left-align"><h4>Certificate Of Product</h4></button>

		<div id="S4" class="w3-container w3-hide">
			<div class ="containImage" style = "overflow-x:scroll;">
				<div class="w3-content" style="max-width:1200px">
					@foreach($certificate as $item)
						<div class="mySlides">
							<img src="{{ asset('uploads')}}/{{ $item->image }}" style="width:200px">
							<div class = "imgInfo">
								<h3><b>{{ $item->name  }}</b></h3>
								<p><b>Name Of Organization:</b> 12/12/2017</p>
								<p><b>Name Of Product: </b>Passion</p>
								<p><b>ID Of VietGAP: </b>TCCN-VietGAP 12-12-12-2017</p>
								<p><b>Release date: </b>12/12/2017</p>
								<p><b>Expire date: </b>12/12/2020</p>
							</div>
						</div>
					@endforeach

					<div class="w3-row-padding w3-section">
						@foreach($certificate as $item)
						<div class="w3-col s1">
							<img src="{{ asset('uploads')}}/{{ $item->image }}" class="w3-hover-opacity" style="width:50px" onclick="currentDiv({{ $loop->index + 1  }})">
						</div>
						@endforeach
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="w3-container w3-light-green">
		<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-green w3-xlarge">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
			<p class="w3-medium">The information is provided by  <a href="https://thinhantrading.com/" target="_blank">Thinh An Trading Co., LTD</a></p>
		</footer>
	</div>

    <script>
        var x = location.href;
        document.getElementById("QRcode").innerHTML = x;
    </script>

	<script>
	function myClose(id) {
	    var x = document.getElementById(id);
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	    } else {
	        x.className = x.className.replace(" w3-show", "");
	    }
	}

	function myOpen(id) {
	    var x = document.getElementById(id);
	    if (x.className.indexOf("w3-hide") == -1) {
	        x.className += " w3-hide";
	    } else {
	        x.className = x.className.replace(" w3-hide", "");
	    }
	}
	</script>

	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function currentDiv(n) {
		  showDivs(slideIndex = n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
		     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
		  }
		  x[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " w3-opacity-off";
		}
	</script>

</body>
</html>