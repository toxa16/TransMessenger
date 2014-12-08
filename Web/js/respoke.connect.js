// create a client object
var client = respoke.createClient();

$.get( "http://antonio16.koding.io/index.php?r=ajax/connect", function( data ) {
    // connect using token ID
    client.connect({
        reconnect: false,
        token: data
    });
});

// listen for the 'connect' event
client.listen('connect', function () {
    $("#onlineStatus").html("ONLINE");
});

//if there was connection error
client.listen('error', function (err) {
    $("#status").html("Connection to Respoke failed.");
});

//disconnect listener
client.listen('disconnect', function (evt) {
    $("#onlineStatus").html("");
});
