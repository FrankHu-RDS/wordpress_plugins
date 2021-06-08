

jQuery(document).ready(function(){
    (function ($) {


if($("body").hasClass('login')){
            $("<div class='login_bottom_box'></div>").insertAfter($('body.login #login'));
            $("body.login #login #backtoblog").appendTo($('body.login .login_bottom_box'));
            $("body.login #login #nav").appendTo($('body.login .login_bottom_box'));

            var userName = $("body.login #login form label[for='user_login']").text();
            var password = $("body.login #login form label[for='user_pass']").text();
            var email = $("body.login #login form label[for='user_email']").text();


        $("body.login #login form label[for='user_login']").contents()
            .filter(function(){
                return this.nodeType !== 1;
            })
            .remove();

        $("body.login #login form label[for='user_pass']").contents()
            .filter(function(){
                return this.nodeType !== 1;
            })
            .remove();

        $("body.login #login form label[for='user_email']").contents()
            .filter(function(){
                return this.nodeType !== 1;
            })
            .remove();

            $("body.login #login form input#user_login").attr('placeholder', userName);
            $("body.login #login form input#user_pass").attr('placeholder', password);
            $("body.login #login form input#user_email").attr('placeholder', email);

            var replaced = $(".login_bottom_box #nav").html().replace('|','');
            $(".login_bottom_box #nav").html(replaced);

            $(".login_bottom_box #nav a:last-child").addClass('lost_pasword').insertBefore($(".login_bottom_box #nav a:first-child"));


            $('<div class="register_container"></div>').appendTo($(".login_bottom_box #nav"));
            $(".login_bottom_box #nav a:not('.lost_pasword')").appendTo($(".login_bottom_box #nav .register_container"));


            $('body.login form p:not(.forgetmenot) input, div.wp-pwd input').each(function () {
                if($(this).attr('aria-describedby') === 'login_error'){
                    console.log('error');
                    $(this).parent().siblings('label').addClass('error_filed');
                    $(this).siblings('label').addClass('error_filed');
                }
            })

        if($('body.login.login-action-lostpassword #login_error').length > 0){
            $('body.login.login-action-lostpassword #lostpasswordform label[for="user_login"]').addClass('error_filed');
        }

        if($('body.login.login-action-register #login_error').length > 0){
            $('body.login.login-action-register #registerform label[for="user_email"]').addClass('error_filed');
        }


}
    })(jQuery);
});
