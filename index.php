<?php 
 include 'reader.php';
 $reader = new reader();
 $clients = $reader->getClients();


// print_r($reader->populateSql());
//  exit();

  // check if their is some data 
if (empty($clients)) {
	$reader->populateSql();
}

?>
<!DOCTYPE html>
<html>
	<head>
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="16x16" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Calltronix Test</title>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #00BFFF;
  color: white;
}
div.absolute {
  position: absolute;
  top: 80px;
  right: 80px;
  left: 80px;
}
input[type=text] {
  width: 30%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
</style>
</head>
<body>

<div class="absolute">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for customers name.." title="Type in a name">
<table id="customers">
  <tr>
    <th>Ticket Id</th>
    <th>Client Name</th>
    <th>Mobile No</th>
    <th>Contact Type</th>
    <th>Call Type</th>
    <th>Source Name</th>
    <th>Store Name</th>
    <th>Disposition Name</th>
    <th>Date</th>
  </tr>
  <?php if(!empty($clients)){ foreach($clients as $row){ ?>
  <tr>
    <td><?php echo $row['ticket_id']; ?></td>
    <td><?php echo $row['client_name']; ?></td>
    <td><?php echo $row['mobile_no']; ?></td>
    <td><?php echo $reader->getContactType('',$row['contact_type_id']); ?></td>
    <td><?php echo $reader->getCallType('',$row['call_type_id']); ?></td>
    <td><?php echo $reader->getSourceName('',$row['source_name_id']); ?></td>
    <td><?php echo $reader->getStoreName('',$row['store_name_id']); ?></td>
    <td><?php echo $reader->getDispositionName('',$row['disposition_name_id']); ?></td>
    <td><?php echo date_format(date_create($row['date_created']),"F d, Y"); ?></td>
  </tr>
  <?php }} ?>
</table>
 </div>

 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>