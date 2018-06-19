
$('.content').hide();

$(document).ready(function() {

  statusFormat();

  orderTable = $('#workOrders-table').DataTable({
     ajax: "admin/workOrders",
     rowReorder: {
         selector: 'td:nth-child(2)'
     },
     columnDefs : [
       { targets : [3],
         render : function (data, type, row) {
           switch(data) {
              case '1' : return 'Closed'; break;
              default  : return 'Open';
           }
         },
       }
      ],
     responsive: true,
     columns: [
        {data: 'name'},
        {data: 'unit_number'},
        {data: 'created_at'},
        {data: 'order_status'},
        {mRender: function ( data, type, row ) {
          return '<a data-toggle="tooltip" title="View" data-placement="top" class="show-modal btn btn-default btn-sm action-btns" data-id="' + row.id +
          '"><span class="glyphicon glyphicon-eye-open"></span></a><a data-toggle="tooltip" title="Edit" data-placement="top" class="edit-modal btn btn-default btn-sm action-btns" data-id="' + row.id +
          '"><span class="glyphicon glyphicon-edit"></span></a><a data-toggle="tooltip" title="Delete" data-placement="top" class="delete-modal btn btn-danger btn-sm action-btns" data-id="' + row.id +
          '"><span class="glyphicon glyphicon-trash"></span></a>';}
      }]
  });

  //Show and hide table loader icon
  $('.content').show();
  $('.loader-wrapper').hide();


  //Change status text color
  $('.status-column').each(function() {

      var text = $(this).text();

      if (text == 'Open') {
        $(this).css('color', 'red');
      } else {
        $(this).css('color', 'green');
      }
  });

  //Use sweetalert for order delete confirmation
  $(document).on('submit', '.delete-form', function(e){
    var form = this;

    e.preventDefault(); // <--- prevent form from submitting

    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    },
    function(isConfirm){
      if (isConfirm) {
          form.submit();
        } else {
          return;
        }
    });
  });
});


  $(document).on('click', '.paginate_button', function(){

    $('.status-column').each(function() {

        var text = $(this).text();

        if (text == 'Open') {
          $(this).css('color', 'red');
        } else {
          $(this).css('color', 'green');
        }
    });
  })

  //Bootstrap tooltip
  $(document).ready(function(){
    $('html').tooltip({selector: '[data-toggle="tooltip"]'});
  });


//Show modal
$(document).on('click', '.show-modal', function() {
     $('.modal-title').text('Work Order Details');
     var id = $(this).data('id');

     $.ajax({
          type: 'GET',
          url: 'admin/workOrder/' + id,
          success: function(data) {
            fillShowForm(data);
          }
      });

     $('#showModal').modal('show');
 });



//Edit modal
 $(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Edit Work Order');

    var id = $(this).data('id');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
       type: 'GET',
       url: 'admin/workOrder/' + id,
       success: function(data) {

         fillShowForm(data);
       }
   });

    $('#editModal').modal('show');

    $('.modal-footer').on('click', '.edit', function() {

      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update'
      },
      function(isConfirm){
        if (isConfirm) {
          updateOrder();
          } else {
            return false;
            }
        });
      });

      //Update work order
      function updateOrder() {

        var formData = $('#editForm').serializeArray();
        var formDataObj = {};

        $.each(formData, function(key, val){
          formDataObj[val.name] = val.value;
        })

        $.ajax({
           type: 'POST',
           url: 'admin/workOrder/update/' + id,
           data: formDataObj,
           success: function(data) {

             if (data) {

               orderTable.ajax.reload();
               toastr.success('Successfully updated order!', 'Success Alert', {timeOut: 5000});
             } else {
               toastr.error('Order was not updated!', 'Error Alert', {timeOut: 5000});
             }
           }
        });
      }
  });

 // delete a work order
 $(document).on('click', '.delete-modal', function() {

   $('.modal-title').text('Delete work order');
   var id = $(this).data('id');

   $.ajax({
        type: 'GET',
        url: 'admin/workOrder/' + id,
        success: function(data) {
          fillShowForm(data);
        }
    });

    $('#deleteModal').modal('show');

    //on delete press
    $('.modal-footer').on('click', '.delete', function() {

      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete'
      },
      function(isConfirm){
        if (isConfirm) {

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
             type: 'POST',
             url: 'admin/workOrder/delete/' + id,
             data: id,
             success: function(data) {

               if (data) {

                 orderTable.ajax.reload();
                 toastr.success('Successfully updated order!', 'Success Alert', {timeOut: 5000});
               } else {
                 toastr.error('Order was not updated!', 'Error Alert', {timeOut: 5000});
               }
             }
          });

          } else {
            return false;
            }
        });
      });

    });

 //fill the show order modal
  function fillShowForm(data){

    $('.show-order-data').each(function(order){
      var id = $(this).attr('id');
      $(this).val(data[id]);
    })

    $('.change-status').each(function(){

      if ($(this).val() == 1) {

        $(this).val('Closed');
      } else {
        $(this).val('Open');

      }
  })

  $('.change-permission').each(function(){

    if ($(this).val() == 1) {

      $(this).val('Yes');
    } else {
      $(this).val('No');

    }
})

  }

  // Change status text color
  // $('.order-status').each(function() {
  //
  //     var text = $(this).text();
  //
  //     if (text == 'Open') {
  //       $(this).css('color', 'red');
  //     } else {
  //       $(this).css('color', 'green');
  //     }
  // });

$(document).on('click', '#add-modal', function() {
    clearForm();
    $('.modal-title').text('Create Work Order');
    $('#addModal').modal('show');

});

    //Add new work order to database
    $('.modal-footer').on('click', '#create-order-btn', function(){

    var formData = $('#create-form').serializeArray();
    var formDataObj = {};

    $.each(formData, function(key, val){
      formDataObj[val.name] = val.value;
    })


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
       type: 'POST',
       url: 'admin/workOrder/store',
       data: formDataObj,
       success: function(data) {
         if ($.isEmptyObject(data.error)) {
           $('#addModal').modal('toggle');
           orderTable.ajax.reload();
           toastr.success('Successfully updated order!', 'Success Alert', {timeOut: 5000});
         } else {
           toastr.error('Order was not created!', 'Error Alert', {timeOut: 5000});
           showErrors(data);

         }
       }
    });
  })

//Clear the form data
function clearForm() {

  $('.show-order-data').each(function(order){

    $(this).val('');
    $('.change-status').val('0');
  })

  $(".text-danger").each(function() {
    $(this).text('');

  });
}

function statusFormat(){



}

//Show form errors on submit
function showErrors(errors) {

  $(".text-danger").each(function() {
      var elem = $(this);
      $(this).text('');

      var name = $(this).attr('name');

      if (errors.error[name]) {

        elem.append('<span class="glyphicon glyphicon-remove-circle"></span>');
        elem.after('<span>').append('<span>  ' + errors.error[name] + '</span>');
      }
  });
}