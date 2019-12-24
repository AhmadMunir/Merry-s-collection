<!-- jquery latest version -->
<script src="<?php echo base_url('js/user/vendor/jquery-3.1.1.min.js'); ?>"></script>
<!-- Bootstrap framework js -->
<script src="<?php echo base_url('js/user/bootstrap.min.js') ?>"></script>
<!-- Particles js -->
<script src="<?php echo base_url('js/user/particles.js') ?>"></script>
<!-- All js plugins included in this file. -->
<script src="<?php echo base_url('js/user/plugins.js') ?>"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="<?php echo base_url('js/user/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/validasi.js') ?>"></script>

<!-- notification JS
============================================ -->
<script src="<?php echo base_url() ?>js/general/notifications/Notification.js"></script>
<script src="<?php echo base_url() ?>js/general/notifications/notification-active.js"></script>

<!-- select2 -->
<script src="<?php echo base_url('js/select2/select2.full.min.js'); ?>"></script>
<script>
$(document).ready(function() {
  $('.co').select2({
    placeholder: 'Select an Option'
  });

});
</script>
