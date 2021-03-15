// ****************************************************************
// ******* file created and written by mateen masood **************
// ************* date : 27-sep-2020 ******************************
// ****************** js file-name:product-create.js ******************
// ****************** view file name : Products/Products-create.blade.php ****
// ****************** controller name : Products/ProductController *********


// ********* providde convenient CSRF protection for your AJAX based applications *****
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// ****************************************************************
$(document).ready(()=>{

        // *************************** input tags ***************************

        if ($().tagsinput) {
            $(".tags").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13]
            });
    
            $("body").on("keypress", ".bootstrap-tagsinput input", function (e) {
                if (e.which == 13) {
                e.preventDefault();
                e.stopPropagation();
                }
            });
            }

        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });


        // ***************** letters only and allow space in a name only *********

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");


    // ********************* form validation ***********

      $("#formDailyRecordUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                date: {
                    required: true,
                    // lettersonly: true
                },
                location: {
                    required: true,
                    // lettersonly: true
                },
                name_of_items_distributed: {
                    required: true,
                   
                },
                timing: {
                    required: true,
                    // number: true
                },
                number_of_people: {
                    required: true,
                    // number: true
                },
                amount_collected: {
                    required: true,
                    // number: true
                },


            },
            messages: {
                

            },

            submitHandler: function(form) {
               form_Create(form);
            }

      });

})

// ****************** create from ajax request ********************
// ***************** for adding product tinot database ************

function form_Create(formData) {
//    let createFormData = $('#formCreate').serialize();
var createFormData = $('#formDailyRecordUpdate').serialize();
  var id = $('#recordId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/dastarkhwan/daily-dastarkhwan-record/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/dastarkhwan/daily-dastarkhwan-record";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
