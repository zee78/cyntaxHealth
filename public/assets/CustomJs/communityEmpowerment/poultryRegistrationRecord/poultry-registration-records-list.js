$(document).ready(()=>{

    var table = $('#tblPoultryRegistrationRecord').DataTable({
          responsive: true,
          dom: "Bfrtip",
           buttons: ['copy', 'excel', 'pdf', 'csv' , 'colvis' , 'print'],
          ajax: {
             "url": "/community-empowerment/poultry-registration-record/datatable",
             "dataSrc": ""
         },
         columns: [
           { data : 'id'},
           { data: "name" },
           { data: "address" },
           { data: "cnic" },
           { data: "contact_number" },
           { data: "enrolment_date" },
           { data: "number_of_poultry_given" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <span class="badge badge-primary">`+ row.amount +`</span>
              `
             }
           },
           { data: "amount" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/community-empowerment/poultry-registration-record/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteRecord('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
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
      $id = $("#id").val();

         $.ajax({
          url: '/community-empowerment/poultry-registration-record/'+$id,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{

              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/community-empowerment/poultry-registration-record";

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

  function deleteRecord(id) {
    $("#deleteModel").modal('show');
    $("#id").val(id);
  }
