$(document).ready(()=>{

    var table = $('#tblTaskAssignment').DataTable({
          responsive: true,
          dom: "Bfrtip",
           buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
          ajax: {
             "url": "/task-assignment/task-assignment/datatable",
             "dataSrc": ""
         },
         columns: [
           { data : 'id'},
           { data: "name_of_task" },
           { data: "date_of_task_assignment" },
           { data: "deadline_for_task_submission" },
           { data: "nature_of_task" },
           { data: "description_of_task" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/skincare/trend-analysis/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteTrndAnalysis('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
              </div>


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
        table.columns(5).visible(false);
      }
      // *******************************************************************************

    // ******************** ******************************* confirm delete ajax **********************


    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $trendId = $("#trendId").val();
      console.log($trendId)

         $.ajax({
          url: '/task-assignment/task-assignment/'+$trendId,
          type: 'DELETE',
          data: data,
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

      });



  });

  function deleteTrndAnalysis(id) {
    $("#deleteModel").modal('show');
    $("#trendId").val(id);
  }
