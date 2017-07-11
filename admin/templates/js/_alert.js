function _alert(action, message, redi) {
	if(typeof(redi) === "undefined") redi = "redi = ''";
	else { redi = "redi = '"+redi+"'"; }
	var action = action;
	var message = message;
	var box = '<div id="alert" style="display:none;"><div id="headalert"></div><div id="action_alert">'+action+'</div><div id="message"><div id="messagetext">'+message+'</div><div id="closebutton" '+redi+'>Close</div></div></div>';
	var blackscreen = '<div style="display: none;" id="black_screen_alert"></div>';
	$(box).appendTo("body");
	$(blackscreen).appendTo("body");
	var alertheight = $("#alert").height();
	alertheight = alertheight - alertheight*2;
	$("#alert").attr("style","margin-top: "+alertheight);
	$("#alert,#black_screen_alert").fadeIn(200);
	//$("html").css("overflow","hidden");
}

$(document).on("click","#black_screen_alert,#closebutton", function() {
	var redi = $("#closebutton").attr("redi");
	if(redi != "") window.location = redi;
	$("#alert,#black_screen_alert").fadeOut(500,function() {
		$(this).remove();
	})
})

$(document).keypress(function(e) {
    if(e.which == 13 && $("#black_screen_alert").length > 0) {
    	var redi = $("#closebutton").attr("redi");
		if(redi != "") window.location = redi;
        $("#alert,#black_screen_alert").fadeOut(500,function() {
			$(this).remove();
		})
    }
});