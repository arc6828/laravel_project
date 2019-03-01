<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>


  </head>
  <body>
    <h1>Hello, world!</h1>
    <div>
      <select id="input_province" onchange="showAmphoes()">
        <option value="">กรุณาเลือกจังหวัด</option>
      </select>
    </div>
    <div>
      <select id="input_amphoe" onchange="showDistricts()">
        <option value="">กรุณาเลือกอำเภอ</option>
      </select>
    </div>
    <div>
      <select id="input_district" onchange="showZipcode()">
        <option value="">กรุณาเลือกตำบล</option>
      </select>
    </div>
    <div>
      <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        console.log("HELLO");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //showProvinces();

        $.ajax({
            url:"https://laravel.csincube.com/public/api/province",
            type:"GET",
            jsonpCallback: "getStatus",
            dataType: "jsonp",

        });



      });

      function ajax(url,callback){

      }

      function getStatus(response)
      {
          console.log("Hello2",response);
      }




      function xxx(r){
          console.log("XXX: ", r);
      }



      function showProvinces(){
        //GET INFORMATION
        $.ajax({
				url: "https://laravel.csincube.com/public/api/province?callback=?",
				type: "GET",
				dataType : "jsonp",
                error : function(e){console.log(e);}
  			})
          .done(function(result){
  					console.log(result);
            $("#input_province").empty();
            for(var i=0; i<result.length; i++){
              $("#input_province").append(
                $('<option></option>')
                  .attr("value", ""+result[i].province_code)
                  .html(""+result[i].province)
              );
            }
            //$("#input_province").val($("#input_province option:first").val());
            //console.log("FIRST : ", $("#input_province").val() );

            showAmphoes();
		      }); //END AJAX
      }
      function showAmphoes(){
        var province_code = $("#input_province").val();
        //GET INFORMATION
        $.ajax({
  					url: "https://laravel.csincube.com/public/api/province/"+province_code+"/amphoe",
  					type: "GET",
  					dataType : "json",
  			})
          .done(function(result){
  					console.log(result);
            $("#input_amphoe").empty();
            for(var i=0; i<result.length; i++){
              $("#input_amphoe").append(
                $('<option></option>')
                  .attr("value", ""+result[i].amphoe_code)
                  .html(""+result[i].amphoe)
              );
            }
            showDistricts();
  				}); //END AJAX
      }
      function showDistricts(){
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        //GET INFORMATION
        $.ajax({
  					url: "https://laravel.csincube.com/public/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district",
  					type: "GET",
  					dataType : "json",
  			})
          .done(function(result){
  					console.log(result);
            $("#input_district").empty();
            for(var i=0; i<result.length; i++){
              $("#input_district").append(
                $('<option></option>')
                  .attr("value", ""+result[i].district_code)
                  .html(""+result[i].district)
              );
            }
            showZipcode();
  				}); //END AJAX
      }
      function showZipcode(){
        var province_code = $("#input_province").val();
        var amphoe_code = $("#input_amphoe").val();
        var district_code = $("#input_district").val();
        //GET INFORMATION
        $.ajax({
  					url: "https://laravel.csincube.com/public/api/province/"+province_code+"/amphoe/"+amphoe_code+"/district/"+district_code,
  					type: "GET",
  					dataType : "json",
  			})
          .done(function(result){
  					console.log(result);
            for(var i=0; i<result.length; i++){
              $("#input_zipcode").val(result[i].zipcode);
            }
  				}); //END AJAX
      }
    </script>
  </body>
</html>
