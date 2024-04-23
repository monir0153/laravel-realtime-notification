<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


  <script>
    // Replace these with your actual Pusher credentials
    var pusher = new Pusher('0d20cfc475abce1507ff', {
      cluster: 'ap2',
      encrypted: false // or false if you are not using HTTPS
    });
  
    // Subscribe to the channel
    var channel = pusher.subscribe('my-channel');
  
    // Bind to the event
    channel.bind('form-submitted', function(data) {
      console.log('Received data:', data);
      document.getElementById('title').innerText = 'name ' + data?.post?.title;
      document.getElementById('author').innerText = 'author ' + data?.post?.author;
      
    });
  </script>
  
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <p id="title"></p>
  <p id="author"></p>
</body>