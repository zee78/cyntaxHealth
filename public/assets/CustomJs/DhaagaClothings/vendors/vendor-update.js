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


        // ***************** letters only and allow space in a name only *********

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");


    // ********************* form validation ***********

      $("#formVendorUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                vendor_type: {
                    required: true,
                    // lettersonly: true
                },
                vendor_name: {
                    required: true,
                    // lettersonly: true
                },
                phoneNo: {
                    required: true,
                    number: true
                },
                address: {
                    required: true,
                    // number: true
                },
                product_purchased: {
                    required: true,
                }


            },
            messages: {
                vendor_type: {
                    required: "Please enter vendor type",

                } ,
                vendor_name: {
                    required: "Please enter vendor name",

                } ,
                phoneNo: {
                    required: "Please enter phone number",
                    number: "Please enter valid number",

                } ,
                address: {
                    required: "Please enter address",
                    // number: "Please enter valid number",
                } ,
                product_purchased: {
                    required: "Please enter purchased product"
                }

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
var createFormData = $('#formVendorUpdate').serialize();
var id = $('#venderId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/dhaaga-clothings/vendors/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/dhaaga-clothings/vendors";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
