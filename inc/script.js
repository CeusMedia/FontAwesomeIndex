var FontAwesomeIndex = {

	init: function() {
		var items = $("#icon-matrix li");
		items.bind("mouseenter", FontAwesomeIndex.onMouseEnter);
		items.bind("mouseleave", FontAwesomeIndex.onMouseLeave);
		items.bind("click", function(){
			var query = $(this).children("i").prop("title");
			$(this).trigger("mouseleave");
			$("#search").val(query).trigger("keyup");
		});
		$("#search").bind("keyup", FontAwesomeIndex.onSearchKeyUp).focus();
		$(window).bind("resize", FontAwesomeIndex.onWindowResize).trigger("resize");
	},
	onMouseEnter: function (event) {
		$(this).children("i").addClass("fa-4x");
	},
	onMouseLeave:function (event) {
		$(this).children("i").removeClass("fa-4x");
	},
	onSearchKeyUp: function (event) {
		var query = $(this).val();
		$("#icon-matrix li i").each(function(){
			var matching = $(this).prop("title").match(query);
			matching ? $(this).parent().show() : $(this).parent().hide();
		});
	},
	onWindowResize: function (event) {
		var height = $(window).height() - 100;
		$("#icon-matrix").height(height);
	},
	setMode: function () {
		var url = "./";
		if (value = $("#input_darkMode").prop("checked")) {
			url += "?darkMode";
		}
		document.location.href = url;
	}
};

$(document).ready(FontAwesomeIndex.init);
