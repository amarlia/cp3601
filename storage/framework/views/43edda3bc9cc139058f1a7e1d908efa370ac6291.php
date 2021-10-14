<!DOCTYPE html>

<html>

<head>

    <title></title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

    

<div class="container">

    <h1>Users</h1>
    <div class="row col-md-4  float-right">
        <a class="btn btn-primary mr-2" href="javascript:void(0)" id="settings" data-toggle="modal" data-target="#exampleModal"> Table Settings</a>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewUser"> Create New User</a>
    </div>
    <div class="row mt-4">
        <table id="js-users-table" style="width:100% !important;" class="table table-bordered data-table">
            <thead>
                <tr></tr>
            </thead>
            <tbody class="list" id="js-all-content">
            </tbody>
        </table>
    </div>
</div>

   

<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form id="userForm" name="userForm" class="form-horizontal">

                   <input type="hidden" name="user_id" id="user_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>

     

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-12">

                           <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Phone" value="" maxlength="50" required="">

                        </div>

                    </div>
                    <div class="row col-md-12" id="columns">

                    </div>
                    <div class="row col-md-12">
                    
                               <div class="col-md-3 p-4">
                                   <label for="filters"> Add Columns</label>
                               </div>
                                <div class="col-md-9">
                                    <select name="selcolumns[]" id="js-selcolumns" class="form-control"   multiple="multiple">         
                                            <option ></option>   
                                    </select>
                                </div>
                            </div>
                            <!-- <form id="seletedColumnForm" method="post">         -->
                               
                                <div class="" id="seleted-column">

                                </div>
                            <!-- </form> -->   
                    <div class="row col-md-6 float-right mt-2">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="addcolumns-tab" data-toggle="tab" href="#addcolumns" role="tab" aria-controls="addcolumns" aria-selected="true">Add new Columns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="listcolumns-tab" data-toggle="tab" href="#listcolumns" role="tab" aria-controls="listcolumns" aria-selected="false">Columns to List</a>
            </li>
           
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="addcolumns" role="tabpanel" aria-labelledby="addcolumns-tab">
                <form id="savecolumnForm" name="savecolumnForm" class="form-horizontal">
                    <div class="row col-md-12">
                        <div class="col-md-3 p-4">
                            <label for="column">Column Name</label>
                        </div>
                        <div class="col-md-9 p-4">
                        <input type="text" name="name" class="form-control" id="columnname"  placeholder="Enter Name" required>

                        </div>

                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-3 p-4">
                            <label for="column">Select Type</label>
                        </div>
                        <div class="col-md-9 p-4">
                            <select name="type" id="js-type" class="form-control" required >         
                                    <option value="">Select Type </option>   
                                    <option value="interger">Integer</option>   
                                    <option value="float">Float</option>  
                                    <option value="dateTime">Date</option> 
                                    <option value="string">String</option> 
                            </select>
                        </div>
                        
                    </div>
                    <div class="row col-md-4 float-right">
                        <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                        <button type="button" id="js-save-column" class="btn btn-primary">Save Column</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="listcolumns" role="tabpanel" aria-labelledby="listcolumns-tab">
             <form id="selcolumnsForm" name="selcolumnsForm" class="form-horizontal">
               <div class="row col-md-12">
                    <div class="col-md-3 p-4">
                        <label for="columns">Select Columns</label>
                    </div>
                    <div class="col-md-9 p-4">
                        <select name="columns[]" id="js-list-column" class="form-control" multiple="multiple" >         
                            <option >Select Columns</option>   
                        </select>
                    </div>
                </div>
                <div class="row col-md-4 float-right">
                        <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
                        <button type="button" id="js-save-list" class="btn btn-primary">Save</button>
                    </div>
                    </form>
            </div>
        </div>
        
      </div>
     
    </div>
  </div>
</div>
    

</body>

    

<script type="text/javascript">
 var columns = <?php echo json_encode($columns) ?>;
    $(document).ready(function(){
        var html = '';
        $.each(columns, function(key, value) {
            html += '<option value="' + value.name + '">' + value.name + '</option>';
                      
        });                   
        $('#js-list-column').html(html);
        datatable();
    }); 
    function datatable(){   
            //  $('#js-users-table').DataTable().clear().destroy();

            $.ajax({
                type:"GET",
                url: "<?php echo e(route('users.datatable')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{columns},
                success:function(response){
                   
                    $('#js-users-table').DataTable({
                        stateSave: true,
                       "bDestroy": true,
                        dom: "Bfrtip",
                        data: response.data.data,
                        columns: response.columns,
                    });    
                    columns = response.columns;              
                }                
            });         
        }
     $(function () {       

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });
      $('body').on('click', '.editUser', function () {
      var user_id = $(this).data('id');
      $.get("<?php echo e(route('users.index')); ?>" +'/' + user_id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#user_id').val(data.user.id);
          $('#name').val(data.user.name);
          $('#mobile_number').val(data.user.mobile_number);
          var html='';
          var html2='';
          $('#seleted-column').html('');
          $('#columns').html('');
          var selfilterdiv = $('#columns'); 
          $.each(data.user.custom_keys, function(key, value) {   
             var name = value.charAt(0).toUpperCase() + value.slice(1);
            html += '<div class="row col-md-12 mt-4"> <div class="col-md-3 p-2">';
            html += '<label for="filters">'+value+'</label> </div>'
            var item='<input type="text" class="form-control " id="js-filter-select'+value+'" value="'+data.user[value]+'" placeholder="" name="'+value+'"/>';
            html += '<div class="col-md-9">'+item+'  </div> </div>'
           
           }); 
               
          selfilterdiv.append(html);  
          $.each(data.columns, function(key, column) {
            if(column.name !=='user_id'){
                 var columnname = column.name.charAt(0).toUpperCase() + column.name.slice(1);
                html2 += '<option value="' + column.name + '">' + columnname + '</option>';                        
          
            }  
           });     
              columns  =data.columns;  
                     
          $('#js-selcolumns').html(html2);
          
      })
   });
    
   
    
    $('body').on('click', '.deleteUser', function () {
     
        var user_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('users.destroy')); ?>"+'/'+user_id,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
       
      $('#js-selcolumns').on('change', function(){
          
        var selcolumns = $('#js-selcolumns').val();  
        var selfilterdiv = $('#seleted-column');    
         selfilterdiv.empty(); 
            $.ajax({
                type:"GET",
                url: "<?php echo e(route('users.getColumnType')); ?>",                
                data:{
                   
                    columns:selcolumns           
                },
                success:function(response){
                  var html='';
                    $.each(response.columns, function(key, value) {   
                        var name =  value.name.charAt(0).toUpperCase() + value.name.slice(1);
                        html += '<div class="row col-md-12 mt-4"> <div class="col-md-3 p-2">';
                        html += '<label for="filters">'+name+'</label> </div>'
                        var item='<input type="text" class="form-control " id="js-filter-select'+value.name+'"  placeholder="" name="'+value.name+'"/>';
                        html += '<div class="col-md-9">'+item+'  </div> </div>'
                    
                    }); 
                        
                    selfilterdiv.append(html);  
                    columns=response.columns ; 
                     datatable();
                   
                   
                   
                }
            });
        });
    $('#js-save-column').click(function () {
        
        $(this).html('Sending..');
       
        
        $.ajax({
          data:  $('#savecolumnForm').serialize(),
          url: "<?php echo e(route('users.addcolumn')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              var html="";
              $('#savecolumnForm').trigger("reset");
              $('#exampleModal').modal('hide');
              $('#js-save-column').html('Save Column'); 
              $.each(data.columns, function(key, value) {
                html += '<option value="' + value.name + '">' + value.name + '</option>';                        
              });       
              columns  =data.columns;           
              $('#js-list-column').html(html);
              window.location.reload();
            //   $('#js-users-table').DataTable().ajax.reload();
             
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#js-save-column').html('Save Changes');
          }
      });
    

    });
    $('#js-save-list').click(function () {
        
        $(this).html('Sending..');
       
       var data = $('#js-list-column').val();
        $.ajax({
          data:  { data},
          url: "<?php echo e(route('users.selColumns')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              
              $('#selcolumnsForm').trigger("reset");
              $('#exampleModal').modal('hide');
              $('#js-save-list').html('Save Column'); 
              setTimeout(function(){
                window.location.reload();
                });
            //   $('#js-users-table').DataTable().ajax.reload();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#js-save-list').html('Save Changes');
          }
      });
    

    });     

    $('#createNewUser').click(function () {

        $('#saveBtn').val("create-user");

        $('#user_id').val('');

        $('#userForm').trigger("reset");
        $('#columns').html('');
        $('#modelHeading').html("Create New User");
        var html = '';
        $.each(columns, function(key, value) {
                html += '<option value="' + value.name + '">' + value.name + '</option>';                        
              });                   
              $('#js-selcolumns').html(html);
        $('#ajaxModel').modal('show');

    });

    $('#saveBtn').click(function () {
        
        $(this).html('Creating..');
       
        
        $.ajax({
          data:  $('#userForm').serialize(),
          url: "<?php echo e(route('users.store')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              
              $('#savecolumnForm').trigger("reset");
              $('#exampleModal').modal('hide');
              $('#js-save-column').html('Save Column'); 
              $.each(columns, function(key, value) {
                html += '<option value="' + value.name + '">' + value.name + '</option>';                        
              });                   
              $('#js-list-column').html(html);
            //   $('#js-users-table').DataTable().ajax.reload();
            window.location.reload();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#js-save-column').html('Save Changes');
          }
      });
    

    });

 

     

  });

</script>

</html><?php /**PATH C:\xampp\htdocs\medetuit\resources\views/users/index.blade.php ENDPATH**/ ?>