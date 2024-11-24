@extends('layout.layout')
@section('content')  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:20px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Stores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Stores</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>

          <!-- @can('create-store') -->
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Store</button>
            <br /> <br /> -->
          <!-- @endcan -->

          <div class="box">
            <div class="box-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Store</button>
            <br /> <br />
              <!-- <h3 class="box-title">Manage Stores</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Store Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@can('create-store')
<!-- Create Store Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Store</h4>
      </div>

      <form id="createForm" method="POST" action="{{ route('stores.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="store_name">Store Name</label>
            <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Enter store name" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('update-store')
<!-- Edit Store Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Store</h4>
      </div>

      <form id="updateForm" method="POST" action="#">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div id="edit-messages"></div>
          <div class="form-group">
            <label for="edit_store_name">Store Name</label>
            <input type="text" class="form-control" id="edit_store_name" name="store_name" placeholder="Enter store name" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="edit_active">Status</label>
            <select class="form-control" id="edit_active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('delete-store')
<!-- Remove Store Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Store</h4>
      </div>

      <form id="removeForm" method="POST" action="#">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<script type="text/javascript">
  var manageTable;
  var base_url = "{{ url('/') }}";

  $(document).ready(function() {
    $('#storesMainNav').addClass('active');
    
    // Initialize the datatable
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + '/stores/fetchStores',
      'order': []
    });

    // Submit the create form
    $("#createForm").unbind('submit').on('submit', function(e) {
      e.preventDefault();
      var form = $(this);

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
          manageTable.ajax.reload(null, false);

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            $("#addModal").modal('hide');
            form[0].reset();
            form.find('.form-group').removeClass('has-error').removeClass('has-success');
          } else {
            displayErrors(response.messages, form);
          }
        }
      });
    });

    // Edit function
    function editFunc(id) {
      $.ajax({
        url: base_url + '/stores/' + id + '/edit',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $("#edit_store_name").val(response.name);
          $("#edit_active").val(response.active);

          $("#updateForm").unbind('submit').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
              url: base_url + '/stores/' + id,
              type: 'PUT',
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {
                manageTable.ajax.reload(null, false);

                if(response.success === true) {
                  $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                  '</div>');

                  $("#editModal").modal('hide');
                } else {
                  displayErrors(response.messages, form);
                }
              }
            });
          });
        }
      });
    }

    // Remove function
    function removeFunc(id) {
      if(id) {
        $("#removeForm").on('submit', function(e) {
          e.preventDefault();

          $.ajax({
            url: base_url + '/stores/' + id,
            type: 'DELETE',
            dataType: 'json',
            success: function(response) {
              manageTable.ajax.reload(null, false);

              if(response.success === true) {
                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                '</div>');

                $("#removeModal").modal('hide');
              } else {
                displayErrors(response.messages, form);
              }
            }
          });
        });
      }
    }
  });

  function displayErrors(errors, form) {
    form.find('.form-group').removeClass('has-error').removeClass('has-success');
    if(errors instanceof Object) {
      $.each(errors, function(index, value) {
        var id = $("#" + index);
        id.closest('.form-group').addClass('has-error');
        id.after(value);
      });
    } else {
      $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+errors+
      '</div>');
    }
  }
</script>

@endsection
