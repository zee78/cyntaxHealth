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

      $("#formTaskAssignCreate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                name_of_task: {
                    required: true,
                    // lettersonly: true
                },
                date_of_task_assignment: {
                    required: true,
                    // lettersonly: true
                },
                nature_of_task: {
                    required: true,
                   
                },
                description_of_task: {
                    required: true,
                    // number: true
                },
                deadline_for_task_submission: {
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
var createFormData = new FormData (formData);
    // console.log(createFormData);
    $.ajax({
        url: '/task-assignment/task-assignment',
        type: 'POST',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/task-assignment/task-assignment";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
