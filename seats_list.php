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
              <h2 class="no-margin-bottom">PREFERENCIAS DE ASIENTO</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
              <li class="breadcrumb-item active">Preferencias de asiento</li>
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
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm" style="color: white;" title="Click to add seat..."> <i class="fa fa-plus"></i></a>
                      Lista de Asientos</h3>
                    </div>
                    
                   
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Agregar Asiento</h4>
                              <a data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></a>
                            </div>
                            
                            <form action="seats_pref_save.php" method="POST">
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                  <label>Evento</label>
                                  <select name="event_id" class="form-control">
                                  <option>--Seleccionar Evento--</option>
                                  
                                  <?php
                                  $event_query = $conn->query("SELECT * FROM pref_event") or die(mysql_error());
                                  while ($event_row = $event_query->fetch()) 
                                  { ?>
                                  
                                  <option value="<?php echo $event_row['event_id']; ?>"><?php echo $event_row['event_title']; ?></option>
                                  
                                  <?php } ?>
                                  </select>
                                </div>
                                
                                <div class="form-group">
                                  <label>Prefijo de área</label>
                                  <input name="area_prefix" type="text" placeholder="Introduzca el prefijo de área..." class="form-control" required>
                                  <small class="help-block-none">Gra = Graderias, VP = VIP Asientos, Etc. (Max 15 caracteres)</small>
                                  <br>
                                  <small class="help-block-none">Ejemplo: GRA-NombreEvento o VP-NombreEvento</small>
                                </div>
                                
                                <div class="form-group">
                                  <label>Descripcion</label>
                                  <input name="desc" type="text" placeholder="Ingrese la descripción del área..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Capacidad máxima de asientos</label>
                                  <input name="max_seat" type="number" min="1" max="99999" step="1" placeholder="Ingrese la capacidad máxima de asientos..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Precio por asiento</label>
                                  <input name="ticket_price" type="number" min="0" max="99999" step="1" placeholder="Ingrese el precio por asiento..." class="form-control" required>
                                </div>
                                
                       
                              
                            </div>
                            <div class="modal-footer">
                              <a data-dismiss="modal" style="color: white;" class="btn btn-danger">Cancelar</a>
                              <button type="submit" name="add_seat_pref" class="btn btn-primary">Guardar</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                   
                    
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Detalles Evento</th>
                              <th>Detalles Asiento</th>
                              <th>Precios</th>
                              <th></th>
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
                               </td>
                               
                              <td><?php echo $seat_row['desc'].' ( '.$seat_row['area_prefix'].' ) '; ?></td>
                              <td>
                              <?php echo $seat_row['max_seat'].' x '.$seat_row['ticket_price'].' = '; ?>
                              <?php echo $seat_row['max_seat'] * $seat_row['ticket_price']; ?><br />
                              <small>Capacidad máxima de asientos x Precio por asiento</small>
                              </td>
                           
                              <td>
                              <a style="color: white !important; margin-bottom: 8px;" data-toggle="modal" data-target="#editEventModal<?php echo $prefSeat_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                              <a style="color: white !important; margin-bottom: 8px;" data-toggle="modal" data-target="#deleteEventModal<?php echo $prefSeat_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                              </td>
                            </tr>
                           
                
                      <!-- Modal-->
                      <div id="editEventModal<?php echo $prefSeat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Editar Asiento</h4>
                              <button style="visibility: hidden;" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            
                            <form action="seats_pref_save.php" method="POST">
                            
                            
                            <input type="hidden" name="prefSeat_id" value="<?php echo $prefSeat_id; ?>" />
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                  <label>Evento</label>
                                  <select name="event_id" class="form-control">
                                  <option value="<?php echo $event_row['event_id']; ?>"><?php echo $event_row['event_title']; ?></option>
                                  
                                  <?php
                                  $event_query2 = $conn->query("SELECT * FROM pref_event") or die(mysql_error());
                                  while ($event_row2 = $event_query2->fetch()) 
                                  { ?>
                                  
                                  <option value="<?php echo $event_row2['event_id']; ?>"><?php echo $event_row2['event_title']; ?></option>
                                  
                                  <?php } ?>
                                  </select>
                                </div>
                              
                                <div class="form-group">
                                  <label>Prefijo de área</label>
                                  <input value="<?php echo $seat_row['area_prefix']; ?>" name="area_prefix" type="text" placeholder="Introduzca el prefijo de área..." class="form-control" required>
                                  <small class="help-block-none">Gra = Graderias, VP = VIP Asientos, Etc. (Max 15 caracteres)</small>
                                  <br>
                                  <small class="help-block-none">Ejemplo: GRA-NombreEvento o VP-NombreEvento</small>
                                </div>
                                
                                <div class="form-group">
                                  <label>Descripcion</label>
                                  <input value="<?php echo $seat_row['desc']; ?>" name="desc" type="text" placeholder="Ingrese la descripción del área..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Capacidad máxima de asientos</label>
                                  <input value="<?php echo $seat_row['max_seat']; ?>" name="max_seat" type="number" min="1" max="99999" step="1" placeholder="Ingrese la capacidad máxima de asientos..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Precio por asiento</label>
                                  <input value="<?php echo $seat_row['ticket_price']; ?>" name="ticket_price" type="number" min="0" max="99999" step="1" placeholder="Ingrese el precio por asiento..." class="form-control" required>
                                </div> 
                            </div>
                            
                            <div class="modal-footer">
                              <a data-dismiss="modal" class="btn btn-danger" style="color: white;">Cancelar</a>
                              <button type="submit" name="updateSeatModal" class="btn btn-primary">Actualizar</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      <!-- Modal-->
                      <div id="deleteEventModal<?php echo $prefSeat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Eliminar Asiento</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            
                            <form action="seats_pref_save.php" method="POST">
                            
                            <input type="hidden" name="prefSeat_id" value="<?php echo $prefSeat_id; ?>" />
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                <h5>¿Quieres eliminar el asiento?</h5>
                                <h6>
                                <?php echo "Evento: ".$event_row['event_title']; ?><br />
                                <?php echo "Detalles: ".$seat_row['desc'].' ( '.$seat_row['area_prefix'].' )'; ?><br />
                              
                              
                              
                                </h6>
                                </div>
                             
                            </div>
                            <div class="modal-footer">
                              <a data-dismiss="modal" class="btn btn-danger" style="color: white;">No</a>
                              <button name="delete_seat_pref" class="btn btn-primary">Si</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                     
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
    
    <?php include('script_files.php'); ?>
    
  </body>
</html>