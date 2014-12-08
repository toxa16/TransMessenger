function sendMessage(messageText, displayText, user) {
    // send message
    user.sendMessage({ message : messageText });
    
    // show yourself the message
    $("#messages").append(
        "<li class='sent'>" + displayText + "</li>"
    );

    // clear the text you just sent
    $("#textToSend").val('');
}

// listen for incoming messages from concrete participant
client.listen('message', function(evt) {
    if (evt.endpoint.id == remote) {
        $("#messages").append(
            "<li class='received'>" + evt.message.message  + "</li>"
        );
    }
});

// recipient's language
var userLanguage = $("#userLanguage").val().substr(0, 2);

// your language
var yourLanguage = $("html").attr("lang").substr(0, 2);

// get the recipient name
var remote = $("#remoteId").val();

// get recipient's endpoint
var endpoint = client.getEndpoint({ id: remote });



$("#sendOriginal").click(function (){
    // the text to send
    var originalText = $("#textToSend").val();
    sendMessage(originalText, originalText, endpoint);
});

$("#sendMessage").click(function (){
    // the text to send
    var originalText = $("#textToSend").val();
    
    if (userLanguage == yourLanguage) {
        // send message without translation
        sendMessage(originalText, originalText, endpoint);
    } else {
        var data = {
                source: yourLanguage,
                target: userLanguage,
                q: originalText
            };
    
    // sending transtlate request
    $.get( "http://antonio16.koding.io/index.php?r=ajax/translate", data, function( response ) {
        // parsing responce, cuz it is JSON array
        var result = JSON.parse(response);
           
        // trasnlated text
        var translatedText = null;
            
        if (result.success) {
            translatedText = result.translation;
        } else {
            translatedText = originalText;
        }
            
        // send translated message
        sendMessage(translatedText, originalText, endpoint);
    });
    }
});

$( "#textToSend" ).keypress(function( event ) {
    if ( event.which == 13 ) {
        event.preventDefault();
        $("#sendMessage").click();
    }
});
