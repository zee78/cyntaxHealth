$(document).ready(()=>{

    var table = $('#tblTask').DataTable({
          responsive: true,
          destroy: true,    //ADD DESTROY TRUE
          dom: "Bfrtip",
          buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
          ajax: {
             "url": "/task/datatable",
             "dataSrc": ""
         },
         columns: [
           { data : 'id'},
           { data : 'task.task_id'},
           { data : "task.created_by"},
           { data: "task.task_title" },
           { data: "task.task_detail" },
           {
            render: function (data, type, full, meta) {
                return  (full.user.first_name+' '+full.user.last_name);
            },
          },
          
        //    {
        //     render: function (data, type, full, meta) {
        //         return  (full.task.task_status);
        //     },
        
        //   },
           { render : function(data, type, row , full) {
            
              return `
              <div class="glyph">
                  <a href="/skincare/vendors/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteVendor('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
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

      // *****************  refresh table after every 30 seconds

      setTimeout(function(){  $('#tblTask').DataTable().ajax.reload();  },2000);


      // **************************** hide and display user data ***********************
        // if (typeof role === 'undefined') {
        //     table.columns(5).visible(false);
        // }
      // *******************************************************************************

    // ******************** ******************************* confirm delete ajax **********************


    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $taskId = $("#taskId").val();
      console.log($taskId)

         $.ajax({
          url: '/task/'+$taskId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{

              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/task";

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

  function deleteVendor(id) {
    $("#deleteModel").modal('show');
    $("#taskId").val(id);
  }
