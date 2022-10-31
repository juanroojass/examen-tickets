
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>   -->
  <script src="{{asset('js/app.js')}}"></script>
  
</head>
<body>
    <div id="app2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h1>Pusher Test</h1>
        <!-- <button id="btnPusher">Pusher</button> -->
        <p>
            Try publishing an event to channel <code>my-channel</code>
            with event name <code>my-event</code>.
        </p>
        <ul id="myList">
            <li>Primer mensaje</li>
        </ul>
    </div>
</body>

<script>    
    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

//     var pusher = new Pusher('e4c74275f0ad5ca06c1d', {
//       cluster: 'us2'
//     });

//     var channel = pusher.subscribe('mi-canal');
//     channel.bind('mi-evento', function(data) {
//       // alert(JSON.stringify(data));
//    //    setInterval(() => {
// 	  //   console.log('datos');
// 	  // }, 2000);      

//       console.log(data);
//       const message = data.data;
//       var node = document.createElement("LI");
//       var textnode = document.createTextNode(message.user+"=>"+message.message);
//       node.appendChild(textnode);
//       document.getElementById("myList").appendChild(node);
//     });

    const app2 = new Vue({
        el: '#app2',
        data: {
            
        },
        created: function() {
            // console.log('testXXX')
        },
        methods:{
            
        },
        mounted: function() {
            // Echo = new Echo({
            //     broadcaster: 'pusher',
            //     key: 'e4c74275f0ad5ca06c1d',
            //     cluster: 'us2',
            //     encrypted: true
            // });
    //         Echo.channel(`mi-canal`)
    // .stopListening('sUpdate', (e) => {
    //     alert('test');
    // });
    Echo.leave(`mi-canal`);
            

            // console.log('testXXX')
            // Echo.private('mi-canal');
            // Echo.join('mi-canal')   
            // .joining(() => {
            //     alert('test2');
            // })         
            // .leaving(() => {
            //     alert('test');
            // });
        },
    });

  </script>
