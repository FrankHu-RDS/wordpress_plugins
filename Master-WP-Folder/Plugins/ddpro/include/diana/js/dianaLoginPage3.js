

jQuery(document).ready(function(){
    (function ($) {

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

        var replaced = $("body.login #login #nav").html().replace('|','');
        $("body.login #login #nav").html(replaced);

        $("body.login #login #nav a:last-child").addClass('lost_pasword').insertBefore($(".body.login #login #nav a:first-child"));


        $('<div class="register_container"></div>').appendTo($("body.login #login #nav"));
        $("body.login #login #nav a:not('.lost_pasword')").appendTo($("body.login #login #nav .register_container"));


    })(jQuery);
});
