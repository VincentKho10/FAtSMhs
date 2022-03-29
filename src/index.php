<?php
  $ure = new UserRepository($client);
  $utheader = $ure::$userRepoHead;
  $utbody = $ure::$userRepoBody;
  
  $mre = new MahasiswaRepository($client);
  $mtheader = $mre::$mhsRepoHead;
  $mtbody = $mre::$mhsRepoBody;
?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="inde2.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Logout</a>
    </li>
  </ul>

</nav>

<div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-user-list" data-bs-toggle="list" href="#list-user" role="tab" aria-controls="list-user">User</a>
      <a class="list-group-item list-group-item-action" id="list-mahasiswa-list" data-bs-toggle="list" href="#list-mahasiswa" role="tab" aria-controls="list-mahasiswa">Mahasiswa</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
    </div>
  </div>

  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-user" role="tabpanel" aria-labelledby="list-user-list">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModalUser">Add</button>
        <!-- Modal -->
        <div class="modal fade" id="addModalUser" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($utheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="mahasiswa"){
                    echo '<div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">
                      <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Mahasiswa
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                                foreach($mtbody as $value){
                                  echo '<li><a class="dropdown-item">'.$value[0].' - '.$value[1].'</a></li>';
                                }
                    echo '  </ul>
                          </div></span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1" value="whahahaha">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addModal" disabled>Delete</button>
        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <?php
                  $liuser = filter_input(1,"list-user");
                  echo "Add ".$liuser;
                ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($mtheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="email"){
                    echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addModal" disabled>Update</button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <?php
                  $liuser = filter_input(1,"list-user");
                  echo "Add ".$liuser;
                ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($mtheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="email"){
                    echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <table id="myTableUser" class="display table table-bordered table-striped">
          <thead>
            <tr>
            <?php
              foreach($utheader as $value){
                echo "<th>".$value."</th>";
              }
            ?>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($utbody as $value){
                echo "<tr>";
                foreach($value as $value1){
                  echo "<td>".$value1."</td>";
                }
                echo"</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>










      <div class="tab-pane fade" id="list-mahasiswa" role="tabpanel" aria-labelledby="list-mahasiswa-list">
      
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModalMahasiswa">Add</button>
        <!-- Modal -->
        <div class="modal fade" id="addModalMahasiswa" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelMahasiswa">Add Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($mtheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="email"){
                    echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <button type="button" id="btnDelete" class="btn btn-danger" disabled>Delete</button>
        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <?php
                  $liuser = filter_input(1,"list-user");
                  echo "Add ".$liuser;
                ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($mtheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="email"){
                    echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <button type="button" id="btnUpdate" class="btn btn-warning" disabled>Update</button>
        <!-- Modal -->
        <div class="modal fade" id="updModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <?php
                  $liuser = filter_input(1,"list-user");
                  echo "Add ".$liuser;
                ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                foreach($mtheader as $lab){
                  $pwtyp = $lab=="password"?"password":"text";
                  if($lab=="email"){
                    echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                          </div>';
                  }else{
                    echo '<div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                            <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                          </div>';
                  }
                }
                ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <table id="myTableMahasiswa" class="display table table-bordered table-striped">
          <thead>
            <tr>
            <?php
              foreach($mtheader as $value){
                echo "<th>".$value."</th>";
              }
            ?>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($mtbody as $value){
                echo "<tr>";
                foreach($value as $value1){
                  echo "<td>".$value1."</td>";
                }
                echo"</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>












      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
      
    
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
      <!-- Modal -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
              <?php
                $liuser = filter_input(1,"list-user");
                echo "Add ".$liuser;
              ?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php 
              foreach($mtheader as $lab){
                $pwtyp = $lab=="password"?"password":"text";
                if($lab=="email"){
                  echo '<div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                          <span class="input-group-text">@</span>
                          <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                        </div>';
                }else{
                  echo '<div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                          <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                        </div>';
                }
              }
              ?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      <button type="button" id="btnDelete" class="btn btn-danger" disabled>Delete</button>
      <!-- Modal -->
      <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
              <?php
                $liuser = filter_input(1,"list-user");
                echo "Add ".$liuser;
              ?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php 
              foreach($mtheader as $lab){
                $pwtyp = $lab=="password"?"password":"text";
                if($lab=="email"){
                  echo '<div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                          <span class="input-group-text">@</span>
                          <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                        </div>';
                }else{
                  echo '<div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                          <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                        </div>';
                }
              }
              ?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      <button type="button" id="btnUpdate" class="btn btn-warning" disabled>Update</button>
      <!-- Modal -->
      <div class="modal fade" id="updModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
              <?php
                $liuser = filter_input(1,"list-user");
                echo "Add ".$liuser;
              ?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php 
              foreach($mtheader as $lab){
                $pwtyp = $lab=="password"?"password":"text";
                if($lab=="email"){
                  echo '<div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                          <span class="input-group-text">@</span>
                          <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                        </div>';
                }else{
                  echo '<div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">'.$lab.'</span>
                          <input type='.$pwtyp.' class="form-control" aria-label="'.$lab.'" aria-describedby="basic-addon1">
                        </div>';
                }
              }
              ?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <table id="myTable" class="display table table-bordered table-striped">
        <thead>
          <tr>
          <?php
            foreach($theader as $value){
              echo "<th>".$value."</th>";
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($tbody as $value){
              echo "<tr>";
              foreach($value as $value1){
                echo "<td>".$value1."</td>";
              }
              echo"</tr>";
            }
          ?>
        </tbody>
      </table>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
</div>

  
<script>
  $(document).ready( function () {
      $('#myTableUser').DataTable();
      $('#myTableMahasiswa').DataTable();
  });

  $(document).ready( function () {
  });
</script>