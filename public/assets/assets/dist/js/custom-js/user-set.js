$(function () {
    $("#tb-users").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering":false,
      "columnDefs":[
        {
            "searchable":false,
            "targets":[0,5]
        }
      ]
    });
});
