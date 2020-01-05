<!-- <!DOCTYPE html>
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
</body> -->
<div class="container">

            <div class="starter-template">
                <h1>PayPal Payment</h1>
                <p class="lead">Pay Now</p>
            </div>

            <div class="contact-form">

                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>

                <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal">
                    <fieldset>
                        <input title="item_name" name="item_name" type="hidden" value="ahmed fakhr">
                        <input title="item_number" name="item_number" type="hidden" value="12345">
                        <input title="item_description" name="item_description" type="hidden" value="to buy samsung smart tv">
                        <input title="item_tax" name="item_tax" type="hidden" value="1">
                        <input title="item_price" name="item_price" type="hidden" value="7">
                        <input title="details_tax" name="details_tax" type="hidden" value="7">
                        <input title="details_subtotal" name="details_subtotal" type="hidden" value="7">

                        <div class="form-group">
                            <div class="col-sm-offset-5">
                                <button  type="submit"  class="btn btn-success">Pay Now</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!-- /.container -->


////////////////// the success view file /////////////////

    <div class="starter-template">
        <h1>PayPal Payment</h1>
        <p class="lead">Success</p>
    </div>

    <div class="contact-form">
        <div>
            <h2 style="font-family: 'quicksandbold'; font-size:16px; color:#313131; padding-bottom:8px;">Dear Member</h2>
            <span style="color: #646464;">Your payment was successful, thank you for purchase.</span><br/>
        </div>
    </div>
</div><!-- /.container -->



//////////////// the cancel view file ///////////

<div class="container">

    <div class="starter-template">
        <h1>PayPal Payment</h1>
        <p class="lead">Canceld order</p>
    </div>

    <div class="contact-form">

        <div>
            <h3 style="font-family: 'quicksandbold'; font-size:16px; color:#313131; padding-bottom:8px;">Dear Member</h3>
            <span style="color:#D70000; font-size:16px; font-weight:bold;">We are sorry! Your last transaction was cancelled.</span>
        </div>
    </div>
</div><!-- /.container -->
