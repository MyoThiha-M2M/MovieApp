(function (jQuery) {
  ("use strict");
  jQuery(document).ready(function () {
    function activaTav(pill) {
      jQuery(pill).addClass("active show");
    }

    // sticky header anmation and height
    function headerHeight() {
      var height = jQuery("#main-header").height();
      jQuery(".iq-height").css("height", height + "px");
    }

    jQuery(function () {
      var header = jQuery("#main-header"),
        yOffset = 0,
        triggerPoint = 80;
      headerHeight();
      jQuery(window).resize(headerHeight);
      jQuery(window).in("scroll", function () {
        yOffset = jQuery(window).scrollTop();

        if (yOffset >= triggerPoint) {
          header.addClass("menu-sticky animated slideDown");
        } else {
          header.removeClass("menu-sticky animated slideDown");
        }
      });
    });

    // header menu dropdown
    jQuery("[data-toggle=more-toggle]").on("click", function () {
      jQuery(this).next().toggleClass("show");
    });

    jQuery(document).on("click", function (e) {
      let myTargetElement = e.target;
      let selector, mainElement;
      if (
        jQuery(myTargetElement).hasClass("search-toggle") ||
        jQuery(myTargetElement).parent().hasClass("search-toggle") ||
        jQuery(myTargetElement).parent().parent().hasClass("search-toggle")
      ) {
        if (jQuery(myTargetElement).hasClass("search-toggle")) {
          selector = jQuery(myTargetElement).parent();
          mainElement = jQuery(myTargetElement);
        } else if (jQuery(myTargetElement).parent().hasClass("search-toggle")) {
          selector = jQuery(myTargetElement).parent().parent();
          mainElement = jQuery(myTargetElement).parent();
        } else if (
          jQuery(myTargetElement).parent().parent().hasClass("search-toggle")
        ) {
          selector = jQuery(myTargetElement).parent().parent().parent();
          mainElement = jQuery(myTargetElement).parent().parent();
        }
        if (
          !mainElement.hasClass("active") &&
          jQuery(".navbar-list li").find(".active")
        ) {
          jQuery(".navbar-right li").removeClass(".iq-show");
          jQuery(".navbar-right li .search-toggle").removeClass("active");
        }

        selector.toggleClass("iq-show");
        mainElement.toggleClass("active");
        e.preventDefault();
      } else if (jQuery(myTargetElement).is("search-input")) {
      } else {
        jQuery(".navbar-right li").removeClass(".iq-show");
        jQuery(".navbar-right li .search-toggle").removeClass("active");
      }
    });
    jQuery(document).on("click", function (event) {
      var $trigger = jQuery(".main-header .navbar");
      if ($trigger !== event.target && !$trigger.has(event.target).length) {
        jQuery(".main-header .navbar-collapse").collapse("hide");
        jQuery("body").removeClass("nav-open");
      }
    });
    jQuery(".c-toggler").on("click", function () {
      jQuery("body").addClass("nav-open");
    });

    $("#home-slider")
      .slick({
        autoplay: false,
        speed: 800,
        lazyload: "progressive",
        arrows: true,
        dots: false,
        prevArrow:
          '<div class="slick-nav prev-arrow"><i class="fa fa-chevron-right"></i></div>',
        nextArrow:
          '<div class="slick-nav next-arrow"><i class="fa fa-chevron-left"></i></div>',
        responsive: [
          {
            breakpoint: 992,
            settings: {
              dots: true,
              arrows: false,
            },
          },
        ],
      })
      .slickAnimation();
    $(".slick-nav").on("click touch", function (e) {
      e.preventDefault();

      var arrow = $(this);

      if (!arrow.hasClass("animate")) {
        arrow.addClass("animate");
        setTimeout(() => {
          arrow.removeClass("animate");
        }, 1600);
      }
    });

    jQuery(".favorites-slider").slick({
      dots: false,
      arrow: true,
      infinite: true,
      speed: 300,
      autoplay: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      nextArrow:
        '<a href="#" class="slick-arrow slick-next"><i class="fa fa-chevron-right"></i></a>',
      prevArrow:
        '<a href="#" class="slick-arrow slick-prev"><i class="fa fa-chevron-left"></i></a>',
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });

    jQuery("#top-ten-slider").slick({
      slidesToScroll: 1,
      slidesToShow: 1,
      arrows: false,
      fade: true,
      asNavFor: "#top-ten-slider-nav",
      responsive: [
        {
          breakpoint: 992,
          settings: {
            asNavFor: false,
            arrows: true,
            nextArrow:
              '<button class="NextArrow"><i class="fa fa-angle-right"></i></button>',
            prevArrow:
              '<button class="PrevArrow"><i class="fa fa-angle-left"></i></button>',
          },
        },
      ],
    });
    jQuery("#top-ten-slider-nav").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: "#top-ten-slider",
      dots: false,
      arrows: true,
      infinite: true,
      vertical: true,
      verticalSwiping: true,
      centerMode: false,
      nextArrow:
        '<button class="NextArrow"><i class="fa fa-angle-down"></i></button>',
      prevArrow:
        '<button class="PrevArrow"><i class="fa fa-angle-up"></i></button>',
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 600,
          settings: {
            asNavFor: false,
          },
        },
      ],
    });

    jQuery("#trending-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      draggable: false,
      asNavFor: "#trending-slider-nav",
    });

    jQuery("#trending-slider-nav").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: "#trending-slider",
      dots: false,
      arrows: true,
      nextArrow:
        '<a href="#" class="slick-arrow slick-next"><i class="fa fa-chevron-right"></i></a>',
      prevArrow:
        '<a href="#" class="slick-arrow slick-prev"><i class="fa fa-chevron-left"></i></a>',
      infinite: true,
      centerMode: true,
      centerPadding: 0,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });

    jQuery(".episodes-slider1").owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i> ",
      ],
      dots: false,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 4,
        },
      },
    });

    jQuery(".trending-content").each(function () {
      var highestBox = 0;
      jQuery(".tab-pane", this).each(function () {
        if (jQuery(this).height() > highestBox) {
          highestBox = jQuery(this).height();
        }
      });
      jQuery(".tab-pane", this).height(highestBox);
    });

    if (jQuery("select").hasClass("season-select")) {
      jQuery("select").select2({
        theme: "bootstrap4",
        allowClear: false,
        width: "resolve",
      });
    }
  });
})(jQuery);

// Form Validation and ImageUpload

const chosenProfileTag = document.getElementById("customerProfile");
const uploadProfileTag = document.getElementById("uploadProfile");
const noProfileTag = document.getElementById("noProfile");
uploadProfileTag.onchange = () => {
  let reader = new FileReader();
  reader.readAsDataURL(uploadProfileTag.files[0]);
  reader.onload = () => {
    noProfileTag.style.display = "none";
    chosenProfileTag.style.display = "block";
    chosenProfileTag.src = reader.result;
  };
};

const nameErrorTag = document.getElementById("name-error");
const userNameErrorTag = document.getElementById("userName-error");
const emailErrorTag = document.getElementById("email-error");
const passwordErrorTag = document.getElementById("password-error");
const conPasswordErrorTag = document.getElementById("confirmPassword-error");

const validateName = () => {
  const nameTag = document.getElementById("fullname-input").value;
  if (nameTag.length === 0) {
    nameErrorTag.innerHTML = "Full Name is required";
    return false;
  }

  if (!nameTag.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
    nameErrorTag.innerHTML = "Enter Full Name";
    return false;
  }
  nameErrorTag.innerHTML = "<i class='validCheck fas fa-check-circle'></i>";
  return true;
};

const validateUserName = () => {
  const usernameTag = document.getElementById("username-input").value;

  if (usernameTag.length === 0) {
    userNameErrorTag.innerHTML = "Username is required";
  }

  if (usernameTag.length < 9) {
    userNameErrorTag.innerHTML = "Enter at least 8 characters";
    return false;
  }

  userNameErrorTag.innerHTML = "<i class='validCheck fas fa-check-circle'></i>";
  return true;
};

const validateEmail = () => {
  const emailTag = document.getElementById("email-input").value;
  if (emailTag.length === 0) {
    emailErrorTag.innerHTML = "Email is required";
    return false;
  }

  if (
    !emailTag.match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )
  ) {
    emailErrorTag.innerHTML = "Enter Valid Email";
    return false;
  }

  emailErrorTag.innerHTML = "<i class='validCheck fas fa-check-circle'></i>";
  return true;
};

const validatePassword = () => {
  const passwordTag = document.getElementById("password-input").value;
  if (passwordTag.length === 0) {
    passwordErrorTag.innerHTML = "Password is required";
    return false;
  }

  if (passwordTag.length < 8 || passwordTag.length > 20) {
    passwordErrorTag.innerHTML = "Password Invalid";
    return false;
  }

  passwordErrorTag.innerHTML = "<i class='validCheck fas fa-check-circle'></i>";
  return true;
};

const validateConPassword = () => {
  const conPasswordTag = document.getElementById("conPassword-input").value;
  const passwordTag = document.getElementById("password-input").value;

  if (conPasswordTag != passwordTag) {
    conPasswordErrorTag.innerHTML = "Password is not matched";
    return false;
  }
  conPasswordErrorTag.innerHTML =
    "<i class='validCheck fas fa-check-circle'></i>";
  return true;
};
