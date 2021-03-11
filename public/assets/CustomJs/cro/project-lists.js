// ********* providde convenient CSRF protection for your AJAX based applications *****
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(()=>{
  
  var table = $('#tblProject').DataTable({
    
    responsive: true,
    dom: "Bfrtip",
    buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
    ajax: {
           "url": "/cro/project/datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         { data: "project_id"},
         { data: "project_type" },
         { data: "title" },
         { data: "funder.funding_organization_name" },
         { data: "funder_type" },
         { data: "amount" },
         { data: "start_date" },
         { data: "end_date" },
         { data: "team_lead" },
         { data: "team_members" },
         { data: "order_status" },
        { render : function(data, type, row , full) {
          // console.log(row)
            return `
            <div class="glyph">
                <a href="/cro/project/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteBatch('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
            </div>


            `
           }
        },
        { render : function(data, type, row) {
            
             return `
                     <select class="form-control select2" name="change_status" id="change_status" data-value="`+row.id+`" >
                          <option>Select Status</option> 
                          <option value="PROCESS">PROCESS</option>              
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
        table.columns(12).visible(false);
        table.columns(13).visible(false);
    }
   // *******************************************************************************

    $(document).on("change", "select[name='change_status']", function(){
     // console.log(this.value);
     // console.log($(this).data("value"))

      $.ajax({
        url: '/cro/project/change-status',
        type: 'POST',
        data: {orderStatus: this.value , orderId: $(this).data("value")},
        // contentType: false,
        // processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
              $('#tblProject').DataTable().ajax.reload();

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
    $projectId = $("#projectId").val();
    console.log($projectId)

       $.ajax({
        url: '/cro/project/'+$projectId,
        type: 'DELETE',
        data: data,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/cro/project";

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
  $("#projectId").val(id);
}