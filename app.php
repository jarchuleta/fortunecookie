<html>
<head>
<title>faceebook app</title>
</head>

<body>
 <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '152445061621781',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>


 
<div class="fb-share-button" data-href="http://localhost:8080/fb/app.php" data-layout="button"></div>
 
 
</body>
</html>


<?php

?>