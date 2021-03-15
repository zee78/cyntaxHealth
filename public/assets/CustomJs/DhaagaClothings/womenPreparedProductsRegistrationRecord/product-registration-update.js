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

      $("#formProductRecordUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                name: {
                    required: true,
                },
                cnic: {
                    required: true,
                    number: true
                },
                phoneNo: {
                    required: true,
                    number: true
                },
                specility: {
                    required: true,
                },
                address: {
                    required: true,
                },


            },
            messages: {
                name: {
                    required: "Please enter name",

                } ,
                cnic: {
                    required: "Please enter cnic",

                } ,
                phoneNo: {
                    required: "Please enter contact number",
                    number: "Please enter valid number",

                } ,
                specility: {
                    required: "Please enter yor specility",
                } ,
                address: {
                    required: "Please enter your address",
                } ,


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
var createFormData = $('#formProductRecordUpdate').serialize();
var id = $('#productId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/dhaaga-clothings/women-product-registration/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/dhaaga-clothings/women-product-registration";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
