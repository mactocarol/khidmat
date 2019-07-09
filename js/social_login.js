var googleUser = {};
localStorage.clear();

var startApp = function() {
    gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
            client_id: '1080052771835-ndtao7jq3p3lqg9gm44rs6nirjvgk5or.apps.googleusercontent.com',//'611631231591-lh1g9i6u5jlnfuv02fmfhl7ls4thuo6h.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
        });
        attachSignin(document.getElementById('customBtn'));
    });
};


function attachSignin(element) {

    auth2.attachClickHandler(element, {},

        function(googleUser) {

            var profile = googleUser.getBasicProfile();
            console.log(profile);
            //alert(profile.getImageUrl());
            localStorage.socialId = profile.getId();
            localStorage.socialType = 'google';

            localStorage.fullName = profile.getName();
            localStorage.firstName = profile.getGivenName();
            localStorage.lastName = profile.getFamilyName();
            localStorage.image = profile.getImageUrl();
            localStorage.email = profile.getEmail();

            var auth2 = gapi.auth2.getAuthInstance();
            auth2.disconnect();

            $('#loading').show();

            var fd = new FormData();
            fd.append('socialId', localStorage.socialId);
            fd.append('socialType', 'google');

            fd.append('fullName', localStorage.fullName);
            fd.append('firstName', localStorage.firstName);
            fd.append('lastName', localStorage.lastName);
            fd.append('image', profile.getImageUrl());
            fd.append('email', localStorage.email);
            console.log(fd);
            $.ajax({
                url: 'user/social_login',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 'success') {
                        location.reload();
                    } else {
                        location.reload();
                    }
                },
            });
        },
        function(error) {});
}
startApp();


function getUserData() {
    FB.api('/me', {
        fields: 'name,id,email,first_name,last_name,name_format'
    }, function(response) {
        console.log(response);
        //email,birthday,location,locale,age_range,currency,first_name,last_name,name_format,gender

        localStorage.socialId = response.id;
        localStorage.socialType = 'facebook';

        localStorage.fullName = (response.name != '' && typeof response.name != "undefined") ? response.name : '';
        localStorage.firstName = (response.first_name != '' && typeof response.first_name != "undefined") ? response.first_name : '';
        localStorage.lastName = (response.last_name != '' && typeof response.last_name != "undefined") ? response.last_name : '';
        localStorage.image = "https://graph.facebook.com/" + response.id + "/picture?type=large";
        localStorage.email = (response.email != '' && typeof response.email != "undefined") ? response.email : '';

        $('#loading').show();

        var fd = new FormData();
        fd.append('socialId', localStorage.socialId);
        fd.append('socialType', 'facebook');

        fd.append('fullName', localStorage.fullName);
        fd.append('firstName', localStorage.firstName);
        fd.append('lastName', localStorage.lastName);
        fd.append('image', localStorage.image);
        fd.append('email', localStorage.email);


        $.ajax({
            url: 'user/social_login',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 'success') {
                    location.reload();
                } else {
                    location.reload();
                }
            },
        });
        facebookLogout();
    });
}

function facebookLogout() {
    FB.logout(function() {})
}

window.fbAsyncInit = function() {
    FB.init({
        //appId: '2293648730906952',
        appId: '655709944880476',
        cookie: true,
        xfbml: true,
        version: 'v3.2'
    });
};

//load the JavaScript SDK
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.com/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


document.getElementById('loginBtn').addEventListener('click', function() {
    //do the login
    FB.login(function(response) {

        if (response.authResponse) {
            getUserData();
        }
    }, {
        scope: 'email,public_profile',
        return_scopes: true
    });
}, false);