<!-- /.content-wrapper -->



  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="#">Election</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <!-- jQuery 2.2.3 -->
<script src="<?php echo $base_url; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $base_url; ?>bootstrap/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo $base_url; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $base_url; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $base_url; ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $base_url; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $base_url; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $base_url; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base_url; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>dist/js/app.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url; ?>datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>



<script>
	$('.submit-visitor').click(function(){
		var name = $('#name').val();
		var email_id = $('#email_id').val();
		var contact_number = $('#contact_number').val();
		var mobcheck = /^\d{10}$/;
		
		if(name ==""){
			$('#name').focus();	
			$('#candidate_nameerr').css('display','block');	
			return false;
		}else{
			$('#candidate_nameerr').css('display','none');	
		}
		
		if(email_id ==""){
			$('#email_id').focus();	
			$('#email_iderr').css('display','block');	
			return false;
		}else{
			$('#email_iderr').css('display','none');	
		}
		
		if (!$("#contact_number").val().match(mobcheck)){
			if(contact_number ==""){
				$('#contact_number').focus();	
				$('#contact_numbererr').css('display','block');	
				return false;
			}else{
				$('#contact_numbererr').css('display','none');	
			}
		}else{
			$('#contact_numbererr').css('display','none');	
		}
	});
	 
	 
</script>

</body>
</html>
