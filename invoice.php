<?php  
 function fetch_data()  
 {  
    include('config/db_connect.php');
      $output = '';  
      //create a query 
      $sql = "SELECT * FROM Buying ";
      //make the query and get result
      $result = mysqli_query($conn,$sql);
      //fetch results (row => array)
      $sells = mysqli_fetch_all($result,MYSQLI_ASSOC);

      foreach ($sells as $sell):  
            $item = $sell['id_item'];
            //create a query 
            $sql = "SELECT * FROM listing WHERE id = '$item'";
            //make the query and get result
            $result = mysqli_query($conn,$sql);
            //fetch results (row => array)
            $row = mysqli_fetch_array($result);

        $output .= '<tr>  
                            <td>'.$row["id"].'</td>  
                            <td>'.$row["title"].'</td>  
                            <td>'.$row["categorie"].'</td>  
                            <td>'.$row["price"].'</td>  
                        </tr>  
                            ';  
        endforeach; 
        return $output;
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("INVOICE");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">INVOICE</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="5%">ID</th>  
                <th width="45%">title</th>  
                <th width="40%">categorie</th>  
                <th width="10%">price</th>  
           </tr>  
          
      ';  
      $content .= fetch_data();  
      $content .= '</table> <p >  <img  src="images/logo-black.png" align="center" width="130" height="80" /> </p>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('Invoice.pdf', 'I');  
       
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>INVOICE</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">INVOICE</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="30%">titel</th>  
                               <th width="10%">categorie</th>   
                               <th width="10%">price</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Download my invoice PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
<?php
    {
         echo '<a href="index.php"> << Back to home page !</a> ';
     }

?>
