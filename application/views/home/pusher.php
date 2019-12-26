<!DOCTYPE html>
<head>
  <title>Pusher Test</title>

</head>
<body>
  <h1>Pusher Test</h1>
  <div id=tes>
  </div>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script>
    $(document).ready(function(){
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('47980f8443159a27e646', {
        cluster: 'ap1',
        forceTLS: true
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        if (data.message == 'halo') {
          $('.tes').html('halo');
        }
      });

    });
  </script>
</body>
