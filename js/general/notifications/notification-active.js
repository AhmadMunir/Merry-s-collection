(function ($) {
 "use strict";
// Basic notifications active class

      if (notif == 'success') {
        Lobibox.notify('success', {
            img: url + 'img/notif/centang.png',
            msg: 'Data Saved'
        });
      }
      if (ntf == 'ceke') {
        Lobibox.notify('info', {
            img: url + 'img/notif/info.png',
            msg: 'Check Your Emeil to Verify Your Email'
        });
      }
})(jQuery);
