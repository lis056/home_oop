$(function() {
	$(".btn").click(function() {
		$(".form-signin").toggleClass("form-signin-left");
    $(".form-signup").toggleClass("form-signup-left");
    $(".container").toggleClass("container-long");
    $(".signup-inactive").toggleClass("signup-active");
    $(".signin-active").toggleClass("signin-inactive");
    $(this).removeClass("idle").addClass("active");
	});
});

// $(function() {
//     $(".btn-signup").click(function() {
//         $(".nav").toggleClass("nav-up");
//         $(".form-signup-left").toggleClass("form-signup-down");
//         $(".success").toggleClass("success-left");
//         $(".container").toggleClass("container-short");
//     });
// });

// $(function() {
//     $(".btn-signin").click(function() {
//         $(".btn-animate").toggleClass("btn-animate-grow");
//         $(".welcome").toggleClass("welcome-left");
//         $(".cover-photo").toggleClass("cover-photo-down");
//         $(".container").toggleClass("container-short");
//         $(".profile-photo").toggleClass("profile-photo-down");
//         $(".btn-goback").toggleClass("btn-goback-up");
//         $(".forgot").toggleClass("forgot-fade");
//     });
// });