<?php 
session_start();

// define("DB_SERVER", "138.68.67.234");
// define("DB_USER", "c0_dash");
// define("DB_PASSWORD", "Ard3Q9tH_Wxo");
// define("DB_DATABASE", "c1_dash_db");

// $dbc = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

// if (isset($_POST['add_btn'])){

//         $deviceType = mysqli_real_escape_string($dbc,$_POST['new_type']); 
//         $deviceName = mysqli_real_escape_string($dbc,$_POST['new_name']); 
//         $deviceLocaiton = mysqli_real_escape_string($dbc,$_POST['new_location']); 
        

//         $sql = "INSERT INTO device (device_type,device_name,device_location) VALUES ('$deviceType','$deviceName','$deviceLocation')";
//         mysqli_query($dbc,$sql);
//         mysqli_close($dbc);
// }
?>

<!DOCTYPE html> 

<!-- This section sets up the page including title, style information, etc -->
<html>
<head>
    <title>Registration Page</title>
      <style>
              
            body{
                    
                background-color: #DEB887;
            }

        </style>
</head>
        
 <!-- THis sections is what actually displays on the webpage -->    
<body>
        <!-- this command links to an external style sheet to be used on the website-->
    <link rel="stylesheet" type="text/css" href="st.css">
        
        <!-- This section contains an unordered list of clickable links to various sections-->
<div id="centeredmenu">
   <ul id="nav">
    <li><a href="/howtoorder">Home</a></li>
    <li><a href="/about_us">About Us</a></li>
    <li><a href="/devices">Devices</a></li>
    <li><a href="/contact_us">Contact Us</a></li>
</ul> 
</div> 
        <!-- This command sets up a button that allows you to log out of ??-->
   <form action="logout.php" method="post">
                <input type="submit" value="Logout!" style="float: right; margin-right: 10px; font-size:15px;">
    </form>
</div> <!-- doesnt have a closing Tag? -->
        

<!-- this section runs client side script (Java script) to...??  it contains functions edit_row, save_row, delete row,and add_row -->        
<script>        
    function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
    
 var type=document.getElementById("type_row"+no);
 var name=document.getElementById("name_row"+no);
 var location=document.getElementById("location_row"+no);
    
 var type_data=type.innerHTML;
 var name_data=name.innerHTML;
 var location_data=location.innerHTML;
    
 type.innerHTML="<input type='text' id='type_text"+no+"' value='"+type_data+"'>";
 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
 location.innerHTML="<input type='text' id='location_text"+no+"' value='"+location_data+"'>";
}

function save_row(no)
{
 var type_val=document.getElementById("type_text"+no).value;
 var name_val=document.getElementById("name_text"+no).value;
 var location_val=document.getElementById("location_text"+no).value;

 document.getElementById("type_row"+no).innerHTML=type_val;
 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("location_row"+no).innerHTML=location_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_type=document.getElementById("new_type").value;
 var new_name=document.getElementById("new_name").value;
 var new_location=document.getElementById("new_location").value;
    
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 if (new_type== '' || new_name== '' || new_location== ''){

       alert('Please provide device infomation!');
 }
 else
 {
        alert('Device has been added!');

 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='type_row"+table_len+"'>"+new_type+"</td><td id='name_row"+table_len+"'>"+new_name+"</td><td id='location_row"+table_len+"'>"+new_location+"</td><td><input type='button' id='edit_button"+table_len+"' value='&#10000' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='&#128426' class='save' onclick='save_row("+table_len+")'> <input type='button' value='&#x1f5d1' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 document.getElementById("new_type").value="";
 document.getElementById("new_name").value="";
 document.getElementById("new_location").value="";
}
}
</script>

</head>
<body>
<div id="header">
<table align='left' style="margin-left:20px; margin-top:20px" cellspacing=2 cellpadding=5 id="data_table" border=1>
<tr>
<th>Type</th>
<th>Name</th>
<th>Location</th>
</tr>
<form method="post" action = "">
<tr>
<td><input type="text" id="new_type"></td>
<td><input type="text" id="new_name"></td>
<td><input type="text" id="new_location"></td>
<td><input type="button" name="add_btn" class="add" onclick="add_row();" value="Add Device"></td>
</tr>
</form>

</table>
</div>

<!-- <div class="header"> 
    <h1><font color="white" font size= "5x">Welcome, you can now connect to Wifi</font></h1>
    <form action="logout.php" method="get">
    <input type="submit" value="Logout!" style="float: left; margin-left: 600px; margin-top: -30px; font-size:15px;">
</form>
</div> -->

<!--
<?php
    if (isset($_SESSION['message'])) {
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?> -->

</body>

</html>
