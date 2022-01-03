 $(document).ready(function() {
     $('#btnDeleteMessage').click(function() {
         if (confirm("Delete this message?")) {
             deleteImage($(this).val())

         }
     });
 });

 function deleteImage(messageId) {
     var theURL = '../ajaxRequest/message.ajax.php';
     // console.log("url -" + theURL);
     $.ajax({
         url: theURL,
         type: 'post',
         data: {
             deleteMessage: 1,
             message_id: messageId
         },
         success: function(response) {
             //  console.log(response, 'response');
             alert(response)
             window.location.href = 'message';
         },
         error: function(jqXHR, exception) {
             var msg = '';
             if (jqXHR.status === 0) {
                 msg = 'Not connect.\n Verify Network.';
             } else if (jqXHR.status == 404) {
                 msg = 'Requested page not found. [404]';
             } else if (jqXHR.status == 500) {
                 msg = 'Internal Server Error [500].';
             } else if (exception === 'parsererror') {
                 msg = 'Requested JSON parse failed.';
             } else if (exception === 'timeout') {
                 msg = 'Time out error.';
             } else if (exception === 'abort') {
                 msg = 'Ajax request aborted.';
             } else {
                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
             }
             console.log(msg);
         },

     });
 }