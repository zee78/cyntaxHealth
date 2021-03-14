$(document).ready(()=>{
  
  $('#tblEmployee').DataTable({
		responsive: true,
		ajax: {
           "url": "/employees/datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         {
            render: function (data, type, full, meta) {
                return (
                    full.user.first_name+' '+full.user.last_name
                );
            },
        },
         { data: "user.email" },
         { data: "user.contact" },
         { data: "date_of_birth" },
         { data: "address" },
        //  { render : function(data, type, row , full) {
        //      console.log(row.user.roles);
        //     return row.user.roles[0]['name']
        // }
        //     },
         { render : function(data, type, row , full) {
            return `
            <div class="glyph">
                <button onclick="chat('`+row.user.id+`')" class="btn btn-success"> <i class="glyph-icon iconsminds-tag primary"></i>Send Message </button>
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

});


