$(document).ready(()=>{

    var table = $('#tblVendors').DataTable({
          responsive: true,
          dom: "Bfrtip",
          buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
          ajax: {
             "url": "/dhaaga-clothings/vendors/datatable",
             "dataSrc": ""
         },
         columns: [
           { data : 'id'},
           { data: "vendor_type" },
           { data: "vendor_name" },
           { data: "purchased_products" },
           { data: "phoneNo" },
           { data: "address" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/dhaaga-clothings/vendors/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteVendor('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
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
        //     table.columns(5).visible(false);
        // }
      // *******************************************************************************

    // ******************** ******************************* confirm delete ajax **********************


    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $venderId = $("#venderId").val();
      console.log($venderId)

         $.ajax({
          url: '/dhaaga-clothings/vendors/'+$venderId,
          type: 'DELETE',
          data: data,
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

      });



  });

  function deleteVendor(id) {
    $("#deleteModel").modal('show');
    $("#venderId").val(id);
  }
