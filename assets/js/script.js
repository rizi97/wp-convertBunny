jQuery("#carousel").owlCarousel({
  autoplay: false,
  lazyLoad: true,
  loop: true,
  margin: 200,
  /*
   animateOut: 'fadeOut',
   animateIn: 'fadeIn',
   */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1,
    },

    600: {
      items: 1,
    },

    1024: {
      items: 2,
    },

    1366: {
      items: 2,
    },
  },
});

//   select js
$(function () {

  $("input#flexSwitchCheckDefault").change(function() {
    if ( $(this).val() == 0 ) {
        window.location.href = window.location.origin + window.location.pathname + '?theme_style=dark';
    }
    else {
        window.location.href = window.location.origin + window.location.pathname;
    }
  });
	
  
  $("#myTab-partner li").on("click", function(){
    var access = document.querySelector("#myTab-partner li:last-child");
    access.scrollIntoView({behavior: 'smooth'}, true);
  });
	
  $("#myTab li button").on("click", function(){
    var access = document.querySelector("#myTab li:last-child");
    access.scrollIntoView({behavior: 'smooth'}, true);
  });
	
	
	$("#myTab-partner li").on("click", function(e){
		e.preventDefault();

		let _tab = jQuery(this).children("a").attr("aria-controls");

		if( $(this).children("a").hasClass("active") ){
			$(this).children("a").removeClass("active");

			$("#myTabContent-partner .tab-pane#" + _tab).removeClass("active show");
			$("#myTabContent-partner .tab-pane#default").addClass("active show");
		}
		else {
			$("#myTab-partner li a").removeClass("active");
			$(this).children("a").addClass("active");

			$("#myTabContent-partner .tab-pane").removeClass("active show");
			$("#myTabContent-partner .tab-pane#" + _tab).addClass("active show");
		}
	});


  $(".ddl-select").each(function () {
    $(this).hide();
    var $select = $(this);
    var _id = $(this).attr("id");
    var wrapper = document.createElement("div");
    wrapper.setAttribute("class", "ddl ddl_" + _id);

    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "ddl-input");
    input.setAttribute("id", "ddl_" + _id);
    input.setAttribute("readonly", "readonly");
    input.setAttribute(
      "placeholder",
      $(this)[0].options[$(this)[0].selectedIndex].innerText
    );

    $(this).before(wrapper);
    var $ddl = $(".ddl_" + _id);
    $ddl.append(input);
    $ddl.append("<div class='ddl-options ddl-options-" + _id + "'></div>");
    var $ddl_input = $("#ddl_" + _id);
    var $ops_list = $(".ddl-options-" + _id);
    var $ops = $(this)[0].options;
    for (var i = 0; i < $ops.length; i++) {
      $ops_list.append(
        "<div data-value='" +
          $ops[i].value +
          "'>" +
          $ops[i].innerText +
          "</div>"
      );
    }

    $ddl_input.click(function () {
      $ddl.toggleClass("active");
    });
    $ddl_input.blur(function () {
      $ddl.removeClass("active");
    });
    $ops_list.find("div").click(function () {
      $select.val($(this).data("value")).trigger("change");
      $ddl_input.val($(this).text());
      $ddl.removeClass("active");
    });
  });
});
// Initialize tooltips
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});
