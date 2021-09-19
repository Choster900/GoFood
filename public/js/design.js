 //Animation init
 new WOW().init();

 //Modal
 $('#myModal').on('shown.bs.modal', function () {
     $('#myInput').focus()
 })

 // Material Select Initialization
 $(document).ready(function () {
     $('.mdb-select').material_select();
 });

 // MDB Lightbox Init
 $(function () {
     $("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
 });