
$('.content').hide();

$(document).ready(function() {

  orderTable = $('#workOrders-table').DataTable({
     order: [[ 3, "desc" ]],
     columnDefs: [
         { orderable: false, targets: 6 }
       ],
     ajax: "admin/workOrders",
     rowReorder: {
         selector: 'td:nth-child(2)'
     },
          responsive: true,
     columns: [
        {data: 'name'},
        {data: 'unit_number'},
        {data: 'order_status'},
        {data: 'created_at'},
        {data: 'category'},
        {data: 'priority'},
        {mRender: function ( data, type, row ) {
          return '<a data-toggle="tooltip" title="View" data-placement="top" class="show-modal action-btns" data-id="' + row.id +
          '"><span class="btn btn-default btn-sm">View</span></a><a data-toggle="tooltip" title="Change status" data-placement="top" class="edit_button action-btns" data-username="' + row.name +'" data-status="' + row.order_status +'" data-id="' + row.id +
          '"><span class="btn btn-warning btn-sm">Status</span></a>';}
      }]
  });

  //Show and hide table loader icon
  $('.content').show();
  $('.loader-wrapper').hide();
  //Bootstrap tooltip
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


//Edit work order status
 $(document).on('click', '.edit_button', function() {

  var statusChangeObj = {};

  //Changing status details
   statusChangeObj.id = $(this).data('id');
   statusChangeObj.username = $('#hidden_name').data('name');
   var name = $(this).data('username');
   var changeDisplayStatus;
   var changedStatus;
   var sweetAlertStatus;

   if ($(this).data('status') == 'Open') {
     changeDisplayStatus = 'Closing';
     changedStatus = 'Closed';
     sweetAlertStatus = 'Closed';
   } else {
     changeDisplayStatus = 'Opening';
     changedStatus = 'Open';
     sweetAlertStatus = 'Opened';
   }

   statusChangeObj.status = changedStatus;


   //Ajax request
   swal({
     title: 'Update status?',
     text: 'You will be ' + changeDisplayStatus + ' ' + name + '\'s work order.',
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Update'
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
              url: 'workOrder/updateStatus',
              data: statusChangeObj,
              success: function(data) {

                if (data == 'success') {

                  swal({
                    title: 'Work order updated!',
                    text: name + '\'s work order has been successfully ' + sweetAlertStatus,
                    type: 'success',
                    confirmButtonColor: '#3085d6'
                  });
                  orderTable.ajax.reload();

                } else {

                  swal({
                    title: 'Oops, something went wrong!',
                    text: 'Please notify your Manager about this error.',
                    type: 'error',
                    confirmButtonColor: '#3085d6'
                  });
                }
              }
          });

       } else {
         return;
       }
   });


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

 //fill the show order modal
  function fillShowForm(data){


    $('.show-order-data').each(function(order){
      var id = $(this).attr('id');
      $(this).val(data[id]);
    })

    
  }

$(document).on('click', '#add-modal', function() {
    clearForm();
    $('.modal-title').text('Create Work Order');
    $('#addModal').modal('show');

});

//Clear the form data
function clearForm() {

  $('.show-order-data').each(function(order){

    $(this).val('');
    $('.change-status').val('');
  })

  $(".text-danger").each(function() {
    $(this).text('');

  });
}
