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
              <h2 class="no-margin-bottom">Tablero</h2>
            </div>
          </header>

          <div class="container-fluid">
                <div class="col-md-12">
                  
                <div id="demo" class="carousel slide" data-ride="carousel">
          
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>


                  </ul>
                  
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="img/conciert.png" alt="concierto" width="1300" height="450" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                      <img src="img/conciert1.png" alt="concierto2" width="1300" height="450" class="img-fluid">
                    </div>

                  </div>
                  

                </div>

                </div>
          </div>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
              
              

                <!-- Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-calendar"></i></div>
                    <div class="title"><span>Total<br>Eventos</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php 
                    $event_query = $conn->query("SELECT * FROM pref_event") or die(mysql_error());
                    echo $event_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>
                
                <!-- Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-users"></i></div>
                    <div class="title"><span>Total<br>Asientos</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php 
                    $seat_query = $conn->query("SELECT * FROM pref_seat") or die(mysql_error());
                    echo $seat_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>
               
              </div>
            </div>
          </section>
 
          
          <hr />
          
          <!-- Projects Section-->
          <section class="projects no-padding-top">
            <div class="container-fluid">
                
            <?php
            
            $seat_query = $conn->query("SELECT * FROM pref_seat") or die(mysql_error());
            while ($seat_row = $seat_query->fetch()) 
            {
                $prefSeat_id=$seat_row['prefSeat_id'];
            
                $event_query = $conn->query("SELECT * FROM pref_event WHERE event_id='$seat_row[event_id]'") or die(mysql_error());
                $event_row = $event_query->fetch();
                
                
                $totalRemaining=$seat_row['max_seat']-$seat_row['currentNum'];
                
            ?>
                          
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow">
                      
                      <?php if($totalRemaining<=0){ ?>
                        <a href="#" class="btn btn-default" style="height: 100%; width: 100%; padding: 0px;"><small>Agotado</small></a></div>
                      <?php }else{ ?>
                        <a href="checkout_ticket.php?seatNum=<?php echo $seat_row['area_prefix'].'-'; ?><?php echo $seat_row['currentNum']+1; ?>&prefSeat_id=<?php echo $seat_row['prefSeat_id']; ?>&event_id=<?php echo $seat_row['event_id']; ?>&currentNum=<?php echo $seat_row['currentNum']; ?>" class="btn btn-info" style="height: 100%; width: 100%; padding: 0px;"><i class="fa fa-shopping-cart"></i><br /><small>Vender</small></a></div>
                      
                      <?php } ?>
                      
                      
                      <div class="text">
                        <h3 class="h4"><?php echo $seat_row['area_prefix']; ?> @ <?php echo $seat_row['ticket_price']; ?></h3><small><?php echo $seat_row['desc']; ?></small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Última entrada vendida: <?php echo $seat_row['area_prefix'].' - '.$seat_row['currentNum']; ?></span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-ticket"></i>Asientos en total: <?php echo $seat_row['max_seat']; ?></div>
                    <div class="comments"><i class="fa fa-dollar"></i>Total vendido: <?php echo $seat_row['currentNum']; ?></div>
                    <div class="comments"><i class="fa fa-file"></i>Total asientos restantes: <?php echo $totalRemaining; ?></div>
                    
                  </div>
                </div>
              </div>
            
            <?php } ?>
            </div>
          </section>
          
          <?php include('footer.php'); ?>
          
        </div>
      </div>
    </div>
    
    <?php include('script_files.php'); ?>
  </body>
</html>