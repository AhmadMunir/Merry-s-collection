<script>
  $(document).ready(function(){
    var pusher = new Pusher('47980f8443159a27e646', {
      cluster: 'ap1',
      forceTLS: true
    });

    //Pusher
    Pusher.logToConsole = true;


    var channel = pusher.subscribe('notif-cart');
    channel.bind('my-event', function(data) {
      if (data.status == 'success') {
        $('#cart_itung').html(data.itung_cart);
      }else if (data.status == 'error') {
        alert(data.ket);
      }
    });
  });
</script>
