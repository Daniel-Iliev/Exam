<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <title>Games</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    

   <body>
   <table id="myTable1">
   <tr>
   <td>
   <input type="text" id="myInput1" onkeyup="searchName()" placeholder="Search for names..">
   </td>
   <td>
   <input type="text" id="myInput2" onkeyup="searchManufacturer()" placeholder="Search for names..">
   </td>
   <td>
   <input type="text" id="myInput3" onkeyup="searchYear()" placeholder="Search for names..">
   </td>
   </tr>
    </table>
<table id="myTable">
  <tr class="header">
    <th >Name</th>
    <th >Manufacturer</th>
    <th >YearReleased</th>
  </tr>
  @foreach($games as $game)
  <tr>
    <td>{{ $game->name }}</td>
    <td>{{ $game->manufacturer }}</td>
    <td>{{ $game->year_released }}</td>
  @endforeach
  
</table>
</body>
<script>
function searchName() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
function searchManufacturer() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
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
function searchYear() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
</html>