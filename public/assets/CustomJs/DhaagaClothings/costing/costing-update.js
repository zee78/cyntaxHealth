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


        // ***************** letters only and allow space in a name only *********

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");


    // ********************* form validation ***********

      $("#formCostingUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                code: {
                    required: true,
                    // lettersonly: true
                },
                type: {
                    required: true,
                    // lettersonly: true
                },
                marketing_cost: {
                    required: true,
                },
                profit_percentage: {
                    required: true,
                },
                profit_amount: {
                    required: true,
                    // lettersonly: true
                },
                gst: {
                    required: true,

                    // lettersonly: true
                },
                total_direct_cost: {
                    required: true,
                    // number: true
                },
                market_retail_price: {
                    required: true,
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


function form_Create(formData) {
//    let createFormData = $('#formCreate').serialize();
// var createFormData = new FormData (formData);
var createFormData = $('#formCostingUpdate').serialize();
var id = $('#costingId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/dhaaga-clothings/costing/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/dhaaga-clothings/costing";
                
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
