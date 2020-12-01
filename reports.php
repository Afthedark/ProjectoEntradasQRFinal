<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

  <body>
    <div class="page">
      
    <?php include('top_navbar.php'); ?>
      
      <div class="page-content d-flex align-items-stretch"> 
      
        <?php include('side_navbar.php'); ?>
        
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">REPORTE DE VENTAS</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
              <li class="breadcrumb-item active">Reportes</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">

                
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                 
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">
                      Lista de Eventos</h3>
                    </div>
                    
                   
                     
                    
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nombre Evento</th>
                              <th>Detalles Asiento</th>
                              <th>Total Entradas</th>
                              <th>Entradas Vendidas</th>
                              <th>Precio Asientos</th>
                              <th>Total Vendido</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                          
                          <?php
                          $rowCtr=0;
                          $seat_query = $conn->query("SELECT * FROM pref_seat") or die(mysql_error());
                          while ($seat_row = $seat_query->fetch()) 
                          {
                            
                            $rowCtr=$rowCtr+1;
                            $prefSeat_id=$seat_row['prefSeat_id'];
                                
                          ?>
                            

                            <tr>
                              <th scope="row"><?php echo $rowCtr ?></th>
                              
                              <td>
                              <?php
                              $event_query = $conn->query("SELECT * FROM pref_event WHERE event_id='$seat_row[event_id]'") or die(mysql_error());
                              $event_row = $event_query->fetch();
                              echo $event_row['event_title'].' ( '.$event_row['event_date'].' ) <br /> <small>'.$event_row['event_venue'].'</small>'; 
                               ?>
                               
                              <td><?php echo $seat_row['desc'].' ( '.$seat_row['area_prefix'].' ) '; ?></td>

                             <td><?php echo $seat_row['max_seat']; ?></td>
                             <td><?php echo $seat_row['currentNum']; ?></td>
                             <td><?php echo $seat_row['ticket_price']; echo "Bs" ?></td>
                              <td>
                              <?php echo $seat_row['currentNum'].' x '.$seat_row['ticket_price'].' = '; echo "Bs" ?>
                              <?php echo $seat_row['currentNum'] * $seat_row['ticket_price']; ?><br />
                              <small>Entradas Vendidas x Precio Asiento</small>
                              </td>                              
                            </tr>                  
                     
                           <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                </div>
  
              </div>
            </div>
          </section>
          
          <?php include('footer.php'); ?>
          
        </div>
      </div>
    </div>
    
    <?php include('script_files1.php'); ?>
    
  </body>
</html>