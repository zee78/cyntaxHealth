// ********* providde convenient CSRF protection for your AJAX based applications *****
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(()=>{
  
  var table = $('#tblFunder').DataTable({
    responsive: true,
    dom: "Bfrtip",
    buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
    ajax: {
           "url": "/research/funders-datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         { data: "funding_organization_name"},
         { data: "website" },
         { data: "email" },
         { data: "phoneNo" },
         { data: "team_lead" },
         { data: "funder_status" },
         { data: "response" },
         { data: "approval_status" },
        { render : function(data, type, row , full) {
          // console.log(row)
            return `
            <div class="glyph">
                <a href="/research/funders/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteBatch('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
            </div>


            `
           }
        },
        { render : function(data, type, row) {
            
             return `
                     <select class="form-control select2" name="change_status" id="change_status" data-value="`+row.id+`" >
                          <option>Select Status</option> 
                          <option value="PENDING">PENDING</option>              
                          <option value="APPROVE">APPROVE</option>              
                  </select>
             `
          }
        },
       ],
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    },

    "rowCallback": function (nRow, aData, iDisplayIndex) {
     var oSettings = this.fnSettings ();
     $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
     return nRow;
     },
     
  });
    // **************************** hide and display user data ***********************
    if (typeof role === 'undefined') {
        table.columns(9).visible(false);
        table.columns(10).visible(false);
    }
   // *******************************************************************************
    $(document).on("change", "select[name='change_status']", function(){
     // console.log(this.value);
     // console.log($(this).data("value"))

      $.ajax({
        url: '/research/funders/change-status',
        type: 'POST',
        data: {orderStatus: this.value , orderId: $(this).data("value")},
        // contentType: false,
        // processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
              $('#tblFunder').DataTable().ajax.reload();

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
      })
    })

  // ******************** ******************************* confirm delete ajax **********************


  $('#deleteData').on('submit' , function(event){
    event.preventDefault();
    var data = $("#deleteData").serialize();
    $funderId = $("#funderId").val();
    console.log($funderId)

       $.ajax({
        url: '/research/funders/'+$funderId,
        type: 'DELETE',
        data: data,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/research/funders";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

    });

});
function deleteBatch(id) {
  $("#deleteModel").modal('show');
  $("#funderId").val(id);
}