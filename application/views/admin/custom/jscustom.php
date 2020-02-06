<script>
var id_c = '';
$(function() {
    loadinbox();

    // Pusher
    // Pusher.logToConsole = true;

    var pusher = new Pusher('47980f8443159a27e646', {
      cluster: 'ap1',
      forceTLS: true
    });

    var chat = pusher.subscribe('chat-channel');
    chat.bind('chat', function(data){
      if (data.status == 'success') {
        if($('.inbox-all').is(":visible")){
          loadinbox();
        } else{
          loadchat(id_c);
        }
      }else if (data.status == 'error') {
        alert(data.ket);
      }
    });

 });


 function loadinbox(){
   $.ajax({
     url : '<?php echo base_url("admin/custom/get_dftrchat")?>',
     type : 'GET',
     dataType  : 'json',
     // data  : {message : msgText},
     success : function(inbox){
       if (inbox.status == 'gagal') {
         alert('tidak ada inbox');
       }else if (inbox.status == 'sukses') {
         html = '';
         for (var i = 0; i < inbox.inbox.length; i++) {
          html += `<tr class="${inbox.inbox[i].status}">
               <td class="">
                   <div class="checkbox checkbox-single checkbox-success">
                       <input type="checkbox" checked>
                       <label></label>
                   </div>
               </td>
               <td><a href="javascript:openchat('${inbox.inbox[i].id_pengirim}')">${inbox.inbox[i].nama_user}</a></td>
               <td><a href="javascript:openchat('${inbox.inbox[i].id_pengirim}')">${inbox.inbox[i].message}</a>
               </td>
               <td></td>
               <td class="text-right mail-date">${inbox.inbox[i].waktu}</td>
           </tr>`;
         }
         $('.inbox-all').fadeIn();
         // loadchat();
         $('.chat-custom').hide();
         $('.unread').html(inbox.unread+' unread')
         $('.unreada').html(inbox.unread)
         $('#chat').html(html);
       }else {
         alert('error');
       }
     }
   });
 }

 function openchat(id){
   id_c = id;
   $('.inbox-all').hide();
   loadchat(id);
   $('.chat-custom').fadeIn();
 }

 function loadchat(id){
   $('.msger-chat').html('');

  var bc = '';
   bc+='<a href="<?php echo base_url() ?>admin/custom/create/'+id+'">Buat Custom</a>';

   $('#buat_custom').html(bc);
   $.ajax({
     type : 'POST',
     url : '<?php echo base_url("admin/custom/get_msg")?>',
     dataType  : 'json',
     data  : {id : id},
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

             if (msg.msg[i].message != '+msg+') {
               appendMessageadmin(msg.msg[i].pembalas[0].username, PERSON_IMG, "left", msg.msg[i].message, msg.msg[i].time);
             }
             if (msg.msg[i].gambar != '+img+') {
              appendgambar(PERSON_NAME, PERSON_IMG, "left", msg.msg[i].gambar, msg.msg[i].time, msg.msg[i].date);
             }
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
 if (!msgText) return;


 $.ajax({
   url : '<?php echo base_url("chat/chat/send")?>',
   type : 'POST',
   dataType  : 'json',
   data  : {message : msgText, penerima : id_c},
   success : function(option){

   }
 });
 // appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
 msgerInput.value = "";

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

 function appendgambar(name, img, side, gmbr, time, date) {
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
