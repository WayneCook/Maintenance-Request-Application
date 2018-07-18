$('.submit-button').on('click', '#create-order-btn', function(){

alert('clicked');
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
     type: 'post',
     url: 'admin/workOrder/store',
     data: formDataObj,
     success: function(data) {
       if ($.isEmptyObject(data.error)) {

         clearForm();
         // orderTable.ajax.reload();
         swal({
          type: 'success',
          title: 'Thank you!',
          text: 'Your maintenance request has successfully been Submitted, Please contact us for any additional questions you may have.',
          confirmButtonColor: '#337ab7'
        },
        function(isConfirm){

          window.location.replace("../dashboard");

        })

       } else {
         toastr.error('Please check for errors in your submission', 'Error Alert', {timeOut: 5000});
         showErrors(data);

       }
     }
  });

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

})
