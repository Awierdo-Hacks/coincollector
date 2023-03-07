const body = document.querySelector('body');
const menu = document.querySelector('.menu-icon');
const menuItems = document.querySelectorAll('.nav__list-item');
const darklightCheckbox = document.querySelector('#dark-light');


menu.addEventListener('click', function () {
    return toggleClass(body, 'nav-active');
});

function toggleClass(element, stringClass) {
	if (element.classList.contains(stringClass)) element.classList.remove(stringClass);else element.classList.add(stringClass);
}

darklightCheckbox.addEventListener("change", () => {
    if (document.body.hasClass("light")) {
        document.body.removeClass("light");
        // $("#switch").removeClass("switched");
    }
    else {
        document.body.addClass("light");
        // $("#switch").addClass("switched");
    }
})


/* Please ❤ this if you like it!


(function($) { "use strict";
		
	//Page cursors

   
	
	//Navigation

	var app = function () {
		var body = undefined;
		var menu = undefined;
		var menuItems = undefined;
		var init = function init() {
			body = document.querySelector('body');
			menu = document.querySelector('.menu-icon');
			menuItems = document.querySelectorAll('.nav__list-item');
			applyListeners();
		};
		var applyListeners = function applyListeners() {
			menu.addEventListener('click', function () {
				return toggleClass(body, 'nav-active');
			});
		};
		var toggleClass = function toggleClass(element, stringClass) {
			if (element.classList.contains(stringClass)) element.classList.remove(stringClass);else element.classList.add(stringClass);
		};
		init();
	}();

	
	//Switch light/dark
	
	$("#switch").on('click', function () {
		if ($("body").hasClass("light")) {
			$("body").removeClass("light");
			$("#switch").removeClass("switched");
		}
		else {
			$("body").addClass("light");
			$("#switch").addClass("switched");
		}
	});          
              
})(jQuery); 

*/