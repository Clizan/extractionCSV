
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
 
 <head>
 
  <title>Download CSV</title>   
  
  <meta charset="UTF-8" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"><!--Biblioteca bootstrap-->

  <style>
   /*Style body*/   
   body{
    zoom: 80%;   
   }
   
   /*title table*/
   #titleTable{
    text-align: center;
   }

   .divTableCSV{
    height:65vh;
    font-size: 11px;
    margin-left: 10px;
    overflow: auto;
    width: 99%;
   }

  </style>

 </head>
 
 <body>

  <div class="container-fluid">

   <h2 id="titleTable">Table to CSV converter</h2>

   <div class="divTableCSV">
  
    <table class="table table-sm table-bordered table-striped table-small">
     <thead class="table table-dark">   
      <tr>
       <td>CODE</td>
       <td>PRODUCTS</td>
       <td>AMOUNT</td>
       <td>PRICE</td>
      </tr>  
     </thead>  
 
     <tbody>
      <tr>
       <td>1</td>
       <td>Rice</td>
       <td>10KG</td>
       <td>14,99</td>
      </tr>  
      <tr>
       <td>2</td>
       <td>Beans</td>
       <td>20KG</td>
       <td>18,90</td>
      </tr>  
      <tr>
       <td>3</td>
       <td>Coffee</td>
       <td>45KG</td>
       <td>140,20</td>
      </tr>  
      <tr>
       <td>4</td>
       <td>Sugar</td>
       <td>5KG</td>
       <td>4,99</td>
      </tr>      
      <tr>
       <td>5</td>
       <td>Fish</td>
       <td>100KG</td>
       <td>1.500,19</td>
      </tr>  
      <tr>
       <td>6</td>
       <td>Chycken</td>
       <td>20KG</td>
       <td>18,90</td>
      </tr>  
      <tr>
       <td>7</td>
       <td>Meat</td>
       <td>45KG</td>
       <td>1.400,20</td>
      </tr>  
      <tr>
       <td>8</td>
       <td>Cereal</td>
       <td>1KG</td>
       <td>4,99</td>
      </tr>    
      <tr>
       <td>9</td>
       <td>Bread</td>
       <td>3KG</td>
       <td>11,20</td>
      </tr>  
      <tr>
       <td>10</td>
       <td>Cheese</td>
       <td>20KG</td>
       <td>18,90</td>
      </tr>         
     </tbody>      
     
    </table>
      
   </div>
  
   <button class="btn btn-success" onclick="tableToCSV()"> Download CSV</button>
  
  </div> 
    
  <script type="text/javascript">
   function tableToCSV() {
    // Variable to store the final csv data
    var csv_data = [];
 
    // Get each row data
    var rows = document.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
     // Get each column data
     var cols = rows[i].querySelectorAll('td,th');
 
     // Stores each csv row data
     var csvrow = [];
     for (var j = 0; j < cols.length; j++) {
      // Get the text data of each cell
      // of a row and push it to csvrow
      csvrow.push(cols[j].innerHTML);
     }
 
     // Combine each column value with comma
     csv_data.push(csvrow.join(";"));
    }
 
    // Combine each row data with new line character
    csv_data = csv_data.join('\n');
 
    // Call this function to download csv file 
    downloadCSVFile(csv_data);
 
   }
 
   function downloadCSVFile(csv_data) {
    // Create CSV file object and feed
    // our csv_data into it
    CSVFile = new Blob([csv_data], {
     type: "text/csv"
    });
 
    // Create to temporary link to initiate
    // download process
    var temp_link = document.createElement('a');
 
    // Download csv file
    var download_at = Date();
    temp_link.download = "produtcs"+download_at + ".csv";
    var url = window.URL.createObjectURL(CSVFile);
    temp_link.href = url;
 
    // This link should not be displayed
    temp_link.style.display = "none";
    document.body.appendChild(temp_link);
 
    // Automatically click the link to
    // trigger download
    temp_link.click();
    document.body.removeChild(temp_link);
   }
  </script>

 </body>
</html>