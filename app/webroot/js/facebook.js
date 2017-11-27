  
window.fbAsyncInit = function() {
    FB.init({
    //   appId      : '484201541923241',
    appId : '531414230531641',
      xfbml      : true,
      cookie : true,
      version    : 'v2.3'
      //oauth      : true,
    //    status : true
    });
    FB.AppEvents.logPageView();
    
//    FB.getLoginStatus(function(response){
//        statusChangeCallback(response);
//    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));



$(document).ready(function(){
    $('#fb_login').click(function(e){
        var url = $(this).attr('href');
        $.oauthpopup({
            path: url,
            // width: 500,
            // height: 350,
            callback: function(){
                window.location.reload();
            }
        });
        e.preventDefault();
    });
    });
