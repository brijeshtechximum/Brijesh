	</div>
  	<!-- /.content-wrapper -->
	<footer class="main-footer">
    	<div class="pull-right hidden-xs">
      		<a href="#" target="_blank"><b>Techximum.in</b></a>
    	</div>
    	<strong>Copyright &copy; 2016 <a href="#" target="_blank">Techximum.in</a>.</strong> All rights
    	reserved.
  	</footer>

</div>
<!-- ./wrapper -->



<!-- DataTables -->
<script src="<?php echo base_url(); ?>resources/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>resources/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>resources/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>resources/admin/js/app.js"></script>

<script>
	$(function(){
		$("#example1").DataTable({
            "ajax": "<?php echo base_url('wp-admin/enquiry/jsonindex'); ?>",
            "order": [[ 0, "desc" ]],
            "aoColumnDefs": [
                { "bVisible": false, "aTargets": [0] },
                {
                    "bSortable": false,
                    "aTargets": ["no-sort"]  
                }],
            "dom": 'T<"clear">lfrtip',
            tableTools: {
                "sSwfPath": "<?php echo base_url("resources/admin/plugins/datatables/extensions/TableTools/swf"); ?>"
            }
		});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
