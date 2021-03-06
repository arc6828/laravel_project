<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Create address</title>


  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
      </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">รายการทั้งหมด</h1>
        <div class="row">
          <div class="col-12">
              <table id="table-example" class="table"></table>
          </div>
        </div>
        <h1 class="mt-5">ที่อยู่สำหรับจัดส่งสินค้า</h1>
        <div class="row">
            <div class="col-sm-8">
                <div class="card mt-5"  >
                  <div class="card-body">
                    <form >
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
                          <div class="col-sm-10">
                            <input class="form-control" id="fullname" placeholder="โปรดระบุ ..." />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-2 col-form-label">ที่อยู่</label>
                          <div class="col-sm-10">
                            <input class="form-control" id="address" placeholder="โปรดระบุ ..." />
                          </div>
                        </div>
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">จังหวัด</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="input_province" onchange="showAmphoes()">

                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">อำเภอ</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="input_amphoe" onchange="showDistricts()">

                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ตำบล</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="input_district" onchange="showZipcode()">

                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="input_zipcode" placeholder="รหัสไปรษณีย์" />
                        </div>
                      </div>
                      <div class="form-group row">

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>


            </div>
        </div>

        <style>
          #map {
            height: 250px;
            width: 100%;
          }
        </style>
        <h1 class="mt-5">Map</h1>
        <div class="row  mb-5">
          <div class="col-12">
            <div id="map"></div>
          </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function(){
        console.log("HELLO");
        showProvinces();
        dataTable();
      });
      function dataTable(){
        var url = "{{ url('/') }}/api/district";
        var callback = function(result){
          var dataSet = [];
          result.forEach(function(element,index) {
            var row = [
              element.id,
              element.district,
              element.amphoe,
              element.province,
              element.zipcode,
            ];
            dataSet.push(row);
          }); //END FOREACH
          //console.log(dataSet);
          var table = $('#table-example').DataTable({
            "data": dataSet,
            "deferRender" : true,
            "columns": [
              { title: "id" },
              { title: "ตำบล" },
              { title: "อำเภอ" },
              { title: "จังหวัด" },
              { title: "zipcode" },
            ],
          }); // END DATATABLE
        };
        //CALL AJAX
        ajax(url,callback);
      }

      function showProvinces(){
        //PARAMETERS
        var url = "{{ url('/') }}/api/province";
        var callback = function(result){
          $("#input_province").empty();
          for(var i=0; i<result.length; i++){
            $("#input_province").append(
              $('<option></option>')
                .attr("value", ""+result[i].province_code)
                .html(""+result[i].province)
            );
          }
          showAmphoes();
        };
        //CALL AJAX
        ajax(url,callback);
      }

      function showAmphoes(){
        //INPUT
        var province_code = $("#input_province").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";
        var callback = function(result){
          //console.log(result);
          $("#input_amphoe").empty();
          for(var i=0; i<result.length; i++){
            $("#input_amphoe").append(
              $('<option></option>')
                .attr("value", ""+result[i].amphoe_code)
                .html(""+result[i].amphoe)
            );
          }
          showDistricts();
        };
        //CALL AJAX
        ajax(url,callback);
      }

      function showDistricts(){
        //INPUT
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district";
        var callback = function(result){
          //console.log(result);
          $("#input_district").empty();
          for(var i=0; i<result.length; i++){
            $("#input_district").append(
              $('<option></option>')
                .attr("value", ""+result[i].district_code)
                .html(""+result[i].district)
            );
          }
          showZipcode();
        };
        //CALL AJAX
        ajax(url,callback);
      }

      function showZipcode(){
        //INPUT
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        var district_code = $("#input_district").val();
        //PARAMETERS
        var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district/"+district_code;
        var callback = function(result){
          //console.log(result);
          for(var i=0; i<result.length; i++){
            $("#input_zipcode").val(result[i].zipcode);
          }
        };
        //CALL AJAX
        ajax(url,callback);
      }

      function ajax(url, callback){
        $.ajax({
    			"url" : url,
    			"type" : "GET",
    			"dataType" : "json",
    		})
        .done(callback); //END AJAX
      }

    </script>
    <script>
      var mymap;
      function initMap() {
        //SIMPLE MAP
        mymap = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 14.133593, lng: 100.615960},
          zoom: 11
        });
        //MARKER
        var marker = new google.maps.Marker({
      	   position: new google.maps.LatLng(100.615960),
      	   map: mymap,
      	   title: 'ถนน ลาดปลาเค้า'
      	});
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap"
    async defer></script>
  </body>
</html>
