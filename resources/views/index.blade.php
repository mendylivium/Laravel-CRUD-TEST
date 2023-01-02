
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobList</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">JobList</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">JobList Posting - <small>CRUD TEST by ROMMEL</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <button class="btn btn-lg btn-primary" id="create-btn">
                    Create Job
                </button>
            </div>
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Job List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Job ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->job_name }}</td>
                            <td>{{ $job->job_description }}</td>
                            <td>{{ $job->done ? 'Done' : 'Ongoing' }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="load_job({{ $job->id }},'{{ $job->job_name }}','{{ $job->job_description }}')">
                                    Edit
                                </button>
                                @if(!$job->done)
                                <button class="btn btn-sm btn-info" onclick="done_job({{ $job->id }})">
                                    Mark as Done
                                </button>
                                @endif
                                <button class="btn btn-sm btn-danger" onclick="delete_job({{ $job->id }})">
                                    Delete
                                </button>                
                            </td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>

        </div>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Job</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="job_name">Job Name</label>
                    <input type="text" class="form-control" id="job_name" placeholder="Enter Job Name">
                </div>
                <div class="form-group">
                    <label for="job_name">Job Description</label>
                    <input type="text" class="form-control" id="job_description" placeholder="Enter Job Description">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" id="submit-btn">Create</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="edit-job">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Job</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="job_name">Job Name</label>
                    <input type="text" class="form-control" id="edit_name" placeholder="Enter Job Name">
                </div>
                <div class="form-group">
                    <label for="job_name">Job Description</label>
                    <input type="text" class="form-control" id="edit_description" placeholder="Enter Job Description">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" onclick="edit_job()">Edit Job</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Created January 2, 2023 - Test Project</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<script>
    const csrf = '{{ csrf_token() }}'; 
    let id_to_edit = 0;
    $(function(){
        $('#create-btn').click(function(){
            $('#modal-lg').modal('show');
        });

        $('#submit-btn').click(function(){
            const job_name = $('#job_name').val();
            const job_description = $('#job_description').val();
            

            $.ajax(
                { 
                    url:'/',
                    method: 'POST',
                    data: {
                        job_name: job_name,
                        job_description: job_description,
                        _token: csrf
                    },
                    success: function(data,status){
                        alert(data['result'] + ': ' + data['text']);
                        location.reload(true);
                    },
                    error: function(data,status) {
                        data = data.responseJSON;
                        alert(data['result'] + ': ' + data['text']);
                    }
                });

        });

        
    });

    function delete_job(id) {

        if(!confirm("Are you sure")) return;

        $.ajax({
            url: '/' + id,
            method: 'POST',
            data: {
                _token: csrf,
                _method: 'DELETE'
            },
            success: function(data,status) {
                alert(data['result'] + ': ' + data['text']);
                location.reload(true);
            },
            error: function(data,status) {
                data = data.responseJSON;
                alert(data['result'] + ': ' + data['text']);
            }
        });

    }

    function done_job(id) {

        if(!confirm("Are you sure")) return;

        $.ajax({
            url: '/done/' + id,
            method: 'POST',
            data: {
                _token: csrf,
            },
            success: function(data,status) {
                alert(data['result'] + ': ' + data['text']);
                location.reload(true);
            },
            error: function(data,status) {
                data = data.responseJSON;
                alert(data['result'] + ': ' + data['text']);
            }
        });

    }

    function load_job(id, name, desc) {
        $('#edit_name').val(name);
        $('#edit_description').val(desc);
        id_to_edit = id;
        $('#edit-job').modal('show');
    }   

    function edit_job(){
        const job_name = $('#edit_name').val();
        const job_description = $('#edit_description').val();
        

        $.ajax({ 
            url: '/edit/' + id_to_edit,
            method:'POST',
            data: {
            job_name: job_name,
            job_description: job_description,
            _token: csrf
            },
        success: function(data,status){
            alert(data['result'] + ': ' + data['text']);
            location.reload(true);
        }});
    }
</script>
</html> 
