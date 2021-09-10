<?php  ?>
<!-- <footer id="footer">
  <div class="footer_bottom">
    <div class="container">
      <p class="copyright">Copyright &copy; 2045 <a href="index.html">Cyber Tech</a></p>
      <p class="developer">Developed By Wpfreeware</p>
    </div>
  </div>
</footer> -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.dataTable').DataTable();
    } );
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

</script>
<script>
  $(document).ready(function(){
    $("#isiamplop").css("display","none"); //Menghilangkan isiamplop ketika pertama kali dijalankan
        $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
          if ($("input[name='pernah']:checked").val() == "1" ) { //Jika radio button "berbeda" dipilih maka tampilkan form
              $("#isiamplop").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
          } else {
              $("#isiamplop").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
          }
      });
    });
</script>
<script type="text/javascript">
   window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false};
   document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}};
   function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)};
   function mousedwn(e){try{if(event.button==2||event.button==3)return false}catch(e){if(e.which==3)return false}}document.oncontextmenu=function(){return false};document.ondragstart=function(){return false};document.onmousedown=mousedwn;
</script>
</body>
</html>