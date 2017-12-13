</main>

<script src="<?php echo base_url();  ?>resources/js/jquery.min.js"></script> 

<script src="<?php echo base_url();  ?>resources/js/custom-new.js"></script> 

<script src="<?php echo base_url();  ?>resources/js/custom.js"></script> 

<script src="<?php echo base_url();  ?>resources/js/radioDisable.js"></script> 

<script src="<?php echo base_url();  ?>resources/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();  ?>resources/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();  ?>resources/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();  ?>resources/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>


<!--<script type="text/javascript">
var SITE = SITE || {};

SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('span'),
      $location = $this.siblings('.file-name');
  if(newVal !== '') {
    $button.text('');
    if($location.length === 0) {
      $button.after('<span class="file-name">' + newVal + '</span>');
    } else {
      $location.text(newVal);
    }
  }
};

$(document).ready(function() {
  $('.btn.btn-primary.btn-file input[type=file]').bind('change focus click', SITE.fileInputs);
});
</script>-->

</body>

</html>