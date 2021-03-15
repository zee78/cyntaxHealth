$(document).ready(()=>{

    var table = $('#tblStitching').DataTable({
          responsive: true,
          dom: "Bfrtip",
           buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
          ajax: {
             "url": "/dhaaga-clothings/women-stitching-registration/datatable",
             "dataSrc": ""
         },
         columns: [
           { data : 'id'},
          //  {
          //     render: function (data, type, full, meta) {
          //         return (
          //             full.user.first_name+' '+full.user.last_name
          //         );
          //     },
          // },
           { data: "name" },
           { data: "address" },
           { data: "cnic" },
           { data: "phone_no" },
           { data: "speciality" },
           { data: "enrolment_date" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/dhaaga-clothings/women-stitching-registration/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteTrndAnalysis('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
              </div>


              `
             }
           },
         //   { render : function(data, type, row) {
         //     return `
         //             <label class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
         //                 <input type="checkbox" class="custom-control-input">
         //                 <span class="custom-control-label">&nbsp;</span>
         //             </label>
         //     `
         // }
         //     },
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
      // if (typeof role === 'undefined') {
      //   table.columns(5).visible(false);
      // }
      // *******************************************************************************

    // ******************** ******************************* confirm delete ajax **********************


    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $trendId = $("#stitchId").val();
      console.log($trendId)

         $.ajax({
          url: '/dhaaga-clothings/women-stitching-registration/'+$trendId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{

              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/dhaaga-clothings/women-stitching-registration";

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
    $("#stitchId").val(id);
  }
