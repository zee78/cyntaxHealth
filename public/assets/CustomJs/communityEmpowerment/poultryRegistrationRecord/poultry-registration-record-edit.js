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

      $("#formPoultryRecordUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                name: {
                    required: true,
                    // lettersonly: true
                },
                cnic: {
                    required: true,
                    // lettersonly: true
                },
                phoneNo: {
                    required: true,
                    number: true,
                   
                },
                enrolment_date: {
                    required: true,
                    // number: true
                },
                number_of_poultry_given: {
                    required: true,
                    number: true
                },
                amount_status: {
                    required: true,
                },
                address: {
                    required: true,
                    // number: true
                },


            },
            messages: {
                

            },

            submitHandler: function() {
               form_Create();
            }

      });

})

// ****************** create from ajax request ********************

function form_Create(formData) {
   let createFormData = $('#formPoultryRecordUpdate').serialize();
   let id = $('#id').val();
    $.ajax({
        url: '/community-empowerment/poultry-registration-record/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/community-empowerment/poultry-registration-record";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
