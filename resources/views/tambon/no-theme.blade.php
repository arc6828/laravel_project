<div>
    <select id="input_province" onchange="showAmphoes()">
        <option value="">กรุณาเลือกจังหวัด</option>
    </select>
</div>
<div>
    <select id="input_amphoe" onchange="showTambons()">
        <option value="">กรุณาเลือกเขต/อำเภอ</option>
    </select>
</div>
<div>
    <select id="input_tambon" onchange="showZipcode()">
        <option value="">กรุณาเลือกแขวง/ตำบล</option>
    </select>
</div>
<div>
    <input id="input_zipcode" placeholder="รหัสไปรษณีย์" />
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