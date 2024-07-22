<x-app-layout>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
    
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        
         
          <li class="nav-item">
            <a class="nav-link"  href="telegramlink" >
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Change Telegram Link</span>
              <i class="menu-arrow"></i>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link"  href="twitterlink" >
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Change Twitter Link</span>
              <i class="menu-arrow"></i>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link"  href="changesupertelegramlink" >
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Change Super Telegram Link</span>
              <i class="menu-arrow"></i>
            </a>
         
          </li>


          <li class="nav-item">
            <a class="nav-link" href="changemixertelegram" >
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Change Mixer Telegram Link</span>
              <i class="menu-arrow"></i>
            </a>
           
          </li>



      
          
          <li class="nav-item">
           
            <form method="POST" action="{{ route('logout') }}" x-data>
              @csrf

            
              <a class="nav-link" href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                   <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
            </a>
          </form>
          </li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Telegram Table</h4>
                   
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>
                              telegram links name
                            </th>
                           
                           
                            <th>
                              Edit
                            </th>

                            <th>
                              Delete
                            </th>
                           
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($telegramlinks as $links)
                          <tr>
                           
                            <td>
                              {{ $links->telegramlink }}
                            </td>

                           
                            
                            <td><a href = 'editelegramlinks/{{ $links->id }}'> <button type="button" class="btn btn-success">Edit</button></a></td>
                            <td><a href = 'deletetelegramlinks/{{ $links->id }}'><button type="button" class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          
                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>




          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Telegram Table</h4>
                   
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>
                              telegram links name
                            </th>
                           
                           
                            <th>
                              Edit
                            </th>

                            <th>
                              Delete
                            </th>
                           
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($telegramlinks as $links)
                          <tr>
                           
                            <td>
                              {{ $links->telegramlink }}
                            </td>

                           
                            
                            <td><a href = 'editelegramlinks/{{ $links->id }}'> <button type="button" class="btn btn-success">Edit</button></a></td>
                            <td><a href = 'deletetelegramlinks/{{ $links->id }}'><button type="button" class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          
                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>




          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Telegram Table</h4>
                   
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>
                              telegram links name
                            </th>
                           
                           
                            <th>
                              Edit
                            </th>

                            <th>
                              Delete
                            </th>
                           
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($telegramlinks as $links)
                          <tr>
                           
                            <td>
                              {{ $links->telegramlink }}
                            </td>

                           
                            
                            <td><a href = 'editelegramlinks/{{ $links->id }}'> <button type="button" class="btn btn-success">Edit</button></a></td>
                            <td><a href = 'deletetelegramlinks/{{ $links->id }}'><button type="button" class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          
                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>






          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Telegram Table</h4>
                   
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>
                              telegram links name
                            </th>
                           
                           
                            <th>
                              Edit
                            </th>

                            <th>
                              Delete
                            </th>
                           
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($telegramlinks as $links)
                          <tr>
                           
                            <td>
                              {{ $links->telegramlink }}
                            </td>

                           
                            
                            <td><a href = 'editelegramlinks/{{ $links->id }}'> <button type="button" class="btn btn-success">Edit</button></a></td>
                            <td><a href = 'deletetelegramlinks/{{ $links->id }}'><button type="button" class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          
                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>


</x-app-layout>
