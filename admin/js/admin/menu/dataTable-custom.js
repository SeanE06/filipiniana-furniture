$(document).ready(function () {
  var table = $('.dataTable').DataTable({
    "order": [],
    "pageLength": 5,
    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
    "aoColumnDefs" : [
    {
     'bSortable' : false,
     'bSearchable' : false,
     'aTargets' : [ 'removeSort' ],
   }]
 });
});