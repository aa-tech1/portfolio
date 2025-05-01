(function($) {
    "use strict";

	jQuery(window).on('load', function() {
	    // init Masonry
		var $grid = $('.adas-personal-portfolio-masonry').masonry({
			// options
			itemSelector: '.adas-personal-portfolio-masonry-item',
		});
		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
		});
	});

	jQuery(document).ready(function($) {
		$("#primary-menu,.adas-personal-portfolio-header__nav");
		$("#primary-menu,.adas-personal-portfolio-header__nav").KeyboardAccessibleDropDown();
	  });
	  
	  $.fn.KeyboardAccessibleDropDown = function() {
		var nav = $(this);
		$("a", nav).focus(function() {
		  $(this).parents("li").addClass("active-focus")
		}).blur(function() {
		  $(this).parents("li").removeClass("active-focus")
		});
	  };

	
})(jQuery);

new ModalVideo('.adas-personal-portfolio-video-btn');


document.addEventListener("DOMContentLoaded", function() {
    var preloader = document.querySelector(".adas-preloader");
    if (preloader) {
        preloader.style.transition = "opacity 1s ease, transform 1s ease";
        preloader.style.opacity = 0;
        preloader.style.transform = "scale(1)";
        setTimeout(function() {
            preloader.style.display = "none"; // Hide preloader after animation ends
        }, 1000); // Adjust the delay to match the duration of the animation
    }
});



// Function to toggle theme mode
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
}

// Check for user's preferred theme
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-theme');
}

// Event listener for the theme toggle button
var themeToggleButtons = document.querySelectorAll('.pw-light-dark-mode');
themeToggleButtons.forEach(function(button) {
    button.addEventListener('click', toggleTheme);
});

