$(function() {
	$(".btn").click(function() {
		$(".form-signin").toggleClass("form-signin-left");
    $(".form-signup").toggleClass("form-signup-left");
    $(".container").toggleClass("container-long");
    $(".signup-inactive").toggleClass("signup-active");
    $(".signin-active").toggleClass("signin-inactive");
    // $(".forgot").toggleClass("forgot-left");
    $(this).removeClass("idle").addClass("active");
	});
});
