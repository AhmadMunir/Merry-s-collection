  <script>
  $(function() {
      loadchat();

      // Pusher
      // Pusher.logToConsole = true;

      var pusher = new Pusher('47980f8443159a27e646', {
        cluster: 'ap1',
        forceTLS: true
      });

      var chat = pusher.subscribe('chat-channel');
      chat.bind('chat', function(data){
        if (data.status == 'success') {
          loadchat();
        }else if (data.status == 'error') {
          alert(data.ket);
        }
      });

   });


  function loadchat(){
    $.ajax({
      url : '<?php echo base_url("chat/chat/get_msg")?>',
      type : 'GET',
      dataType  : 'json',
      // data  : {message : msgText},
      success : function(msg){
        if (msg.status == 0) {
          // alert('tidak ada chat');
        }else if (msg.status == 1) {
          for (var i = 0; i < msg.msg.length; i++) {
            if (msg.msg[i].sender == 1) {
              if (msg.msg[i].message != '+msg+') {
                if (msg.msg[i].status == 0) {
                  appendMessageunread(PERSON_NAME, PERSON_IMG, "right", msg.msg[i].message, msg.msg[i].time, msg.msg[i].date);
                }else if (msg.msg[i].status == 1) {
                  appendMessageread(PERSON_NAME, PERSON_IMG, "right", msg.msg[i].message, msg.msg[i].time, msg.msg[i].date);
                }else {
                  alert('Error, Please Reload Page');
                }
              }

              if (msg.msg[i].gambar != '+img+') {
                if (msg.msg[i].status == 0) {
                  appendgambarunread(PERSON_NAME, PERSON_IMG, "right", msg.msg[i].gambar, msg.msg[i].time, msg.msg[i].date);
                }else if (msg.msg[i].status == 1) {
                  appendgambarread(PERSON_NAME, PERSON_IMG, "right", msg.msg[i].gambar, msg.msg[i].time, msg.msg[i].date);
                }else {
                  alert('Error, Please Reload Page');
                }
              }


              msgerInput.value = "";
            }else {
              appendMessageadmin(msg.msg[i].pembalas[0].username, PERSON_IMG, "left", msg.msg[i].message, msg.msg[i].time);
            }
          }
        }else {
          alert('error');
        }
      }
    });
  }

  const msgerForm = get(".msger-inputarea");
  const msgerInput = get(".msger-input");
  const msgerChat = get(".msger-chat");

  const BOT_MSGS = [
  "Hi, how are you?",
  "Ohh... I can't understand what you trying to say. Sorry!",
  "I like to play games... But I don't know how to play!",
  "Sorry if my answers are not relevant. :))",
  "I feel sleepy! :("
  ];

  // Icons made by Freepik from www.flaticon.com
  const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
  const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
  const BOT_NAME = "BOT";
  const PERSON_NAME = '<?php echo $this->session->nama ?>';

  msgerForm.addEventListener("submit", event => {
  event.preventDefault();

  const msgText = msgerInput.value;
  if (!msgText && $('#imgupload').val() == 0) return;

  var file_data = $('#imgupload').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('message', $('#pesan').val());


  $.ajax({
    url : '<?php echo base_url("chat/chat/send")?>',
    type : 'POST',
    contentType: false,
    cache: false,
    processData:false,
    data  : form_data,
    success : function(option){

    }
  });
  // appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
  msgerInput.value = "";
  $('#pesan').attr("placeholder",'Enter your message...');
  $('#imgupload').value = ""

  // botResponse();
  });

  function appendMessage(name, img, side, text) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time"></div>
        </div>

        <div class="msg-text">${text}</div>
        <div class="status">
          <span class="msg-info-time"></span>

        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }
  function appendMessageadmin(name, img, side, text,time) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-text">${text}</div>
        <div class="status">
          <span class="msg-info-time"></span>

        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }
  function appendMessageunread(name, img, side, text, time, date) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-text">${text}</div>
        <div class="status">
          <span class="msg-info-time">${date}</span>
          <i class="zmdi zmdi-check"></i>
        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }


  function appendgambarunread(name, img, side, gmbr, time, date) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-text"><a href="<?php echo base_url(); ?>/img/custom/${gmbr}" target= "_blank"><img style="height:25%; width:25%;" src="<?php echo base_url(); ?>/img/custom/${gmbr}"></a></div>
        <div class="status">
          <span class="msg-info-time">${date}</span>
          <i class="zmdi zmdi-check"></i>
        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }

  function appendgambarread(name, img, side, gmbr, time, date) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class=""><a href="<?php echo base_url(); ?>/img/custom/${gmbr}" target= "_blank"><img style="height:25%; width:25%;" src="<?php echo base_url(); ?>/img/custom/${gmbr}"></a></div>
        <div class="status">
          <span class="msg-info-time">${date}</span>
          <i class="zmdi zmdi-check"></i>
        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }

// image
  $('#imageupload').click(function(){ $('#imgupload').trigger('click'); });

  $('input[type="file"]').change(function(e){

    var fileName = e.target.files[0].name;

    // alert('The file "' + fileName +  '" has been selected.');
    $('#pesan').attr("placeholder",'The file "' + fileName +  '" has been selected.');

    });
// end of image

  function appendMessageread(name, img, side, text, time, date) {
  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-text">${text}</div>
        <div class="status">
          <span class="msg-info-time">${date}</span>
          <i class="zmdi zmdi-check-all"></i>
        </div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
  }

  //
  // $('#chat-admin').on('click', function(){
  //   botResponsewithmsg('OK ! type your message below, admin will reply direcly');
  // });

  function chatadmin(){
    botResponsewithmsg('OK ! type your message below, admin will reply direcly');
  }
  // TODO: fix chat with admin

  function botResponse() {
  const r = random(0, BOT_MSGS.length - 1);
  const msgText = BOT_MSGS[r];
  const delay = msgText.split(" ").length * 100;

  setTimeout(() => {
    appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
  }, delay);
  }
  function botResponsewithmsg(msg) {

  const msgText = msg;
  const delay = msgText.split(" ").length * 100;

  setTimeout(() => {
    appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
  }, delay);
  }

  // Utils
  function get(selector, root = document) {
  return root.querySelector(selector);
  }

  function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
  }

  function random(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
  }

  </script>
