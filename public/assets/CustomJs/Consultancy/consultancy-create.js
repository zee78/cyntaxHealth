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


    // *****************date picker initilization *************

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

      $("#formFormulationCreate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                formulation_name: {
                    required: true,
                    // lettersonly: true
                },
                ingredient_name: {
                    required: true,
                    // lettersonly: true
                },
                quantity: {
                    required: true,
                    number: true
                },
                equipment_used: {
                    required: true,
                    // number: true
                },
                procedure: {
                    required: true,
                    // number: true
                    
                },
                container_used: {
                    required: true,
                    // number: true,
                },
                label_type_used: {
                    required: true,
                    // number: true,
                },
                pack_size: {
                    required: true,
                    // number: true,
                }


            },
            messages: {
                formulation_name: {
                    required: "Please enter formulation name",

                } ,
                ingredient_name: {
                    required: "Please enter ingredient name",

                } ,
                quantity: {
                    required: "Please enter quantity",
                    number: "Please enter valid number",

                } ,
                equipment_used: {
                    required: "Please enter the name of equipment you used",
                } ,
                procedure: {
                    required: "Please enter preocedure you perform",

                } ,
                container_used: {
                    required: "Please enter the container you used ",


                } ,
                label_type_used: {
                    required: "Please enter the label type you used",

                },
                pack_size: {
                    required: "Please enter the pack size",

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
var createFormData = new FormData (formData);
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/formulation',
        type: 'POST',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/formulation/";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
