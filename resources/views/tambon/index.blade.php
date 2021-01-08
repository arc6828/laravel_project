<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

		<title>ระบบกรอกที่อยู่ไทย จังหวัด อำเภอ ตำบล รหัสไปรษณีย์ ด้วย Laravel + Fetch Javascript (no jquery)</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dropdown
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
					</li>
					<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
				</div>
			</div>
		</nav>
		<div class="container">
			<h1>ระบบกรอกที่อยู่ไทย จังหวัด อำเภอ ตำบล รหัสไปรษณีย์</h1>
			<p>ระบบกรอกที่อยู่ไทย จังหวัด อำเภอ ตำบล รหัสไปรษณีย์ ด้วย Laravel + Fetch Javascript (no jquery)</p>

			<div class="row mb-3 text-center">
				<label class="col-lg-2">จังหวัด</label>
				<div class="col-lg-4">
					<select class="form-select"  id="input_province" onchange="showAmphoes()">
						<option value="">กรุณาเลือกจังหวัด</option>
					</select>
				</div>				
			</div>
			<div class="row mb-3 text-center">
				<label class="col-lg-2">อำเภอ</label>
				<div class="col-lg-4">
					<select class="form-select"  id="input_amphoe" onchange="showTambons()">
						<option value="">กรุณาเลือกเขต/อำเภอ</option>
					</select>
				</div>
			</div>
			<div  class="row mb-3 text-center">
				<label class="col-lg-2">ตำบล</label>
				<div class="col-lg-4">
					<select class="form-select"  id="input_tambon" onchange="showZipcode()">
						<option value="">กรุณาเลือกแขวง/ตำบล</option>
					</select>
				</div>
			</div>
			<div  class="row mb-3 text-center">
				<label class="col-lg-2">รหัสไปรษณีย์</label>
				<div class="col-lg-4">
					<input id="input_zipcode" class="form-control"   placeholder="รหัสไปรษณีย์" />
				</div>
			</div>

			<script>
				document.addEventListener('DOMContentLoaded', (event) => {
					console.log("START");
					showProvinces();    
				});
				function showProvinces(){
					//PARAMETERS
					fetch("{{ url('/') }}/api/provinces")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_province = document.querySelector("#input_province");
							input_province.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.province;
								option.value = item.province;
								input_province.add(option);                
							}
							//QUERY AMPHOES
							showAmphoes();
						});
				}
				function showAmphoes(){
					let input_province = document.querySelector("#input_province");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoes")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_amphoe = document.querySelector("#input_amphoe");
							input_amphoe.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.amphoe;
								option.value = item.amphoe;
								input_amphoe.add(option);                
							}
							//QUERY AMPHOES
							showTambons();
						});
				}
				function showTambons(){
					let input_province = document.querySelector("#input_province");
					let input_amphoe = document.querySelector("#input_amphoe");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoe/"+input_amphoe.value+"/tambons")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_tambon = document.querySelector("#input_tambon");
							input_tambon.innerHTML = "";
							for(let item of result){
								let option = document.createElement("option");
								option.text = item.tambon;
								option.value = item.tambon;
								input_tambon.add(option);                
							}
							//QUERY AMPHOES
							showZipcode();
						});
				}
				function showZipcode(){
					let input_province = document.querySelector("#input_province");
					let input_amphoe = document.querySelector("#input_amphoe");
					let input_tambon = document.querySelector("#input_tambon");
					fetch("{{ url('/') }}/api/province/"+input_province.value+"/amphoe/"+input_amphoe.value+"/tambon/"+input_tambon.value+"/zipcodes")
						.then(response => response.json())
						.then(result => {
							console.log(result);
							//UPDATE SELECT OPTION
							let input_zipcode = document.querySelector("#input_zipcode");
							input_zipcode.value = "";
							for(let item of result){
								input_zipcode.value = item.zipcode;
								break; 
							}
						});
					
				}
			</script>
		
		</div>
		
		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		-->
	</body>
</html>

