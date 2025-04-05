    // Copy menu for mobile
    function copyMenu() {
        // Copy inside .dpt-cat to departments
        var dptCategory = document.querySelector('.dpt-cat');
        var dptPlace = document.querySelector('.departments');
        dptPlace.innerHTML = dptCategory.innerHTML;

        // Copy inside nav to nav
        var mainNav = document.querySelector('.header-nav nav');
        var navPlace = document.querySelector('.off-canvas nav');
        navPlace.innerHTML = mainNav.innerHTML;

        // Copy header-top .wrapper to thetop-nav
        var topNav = document.querySelector('.header-top .wrapper');
        var topPlace = document.querySelector('.off-canvas .thetop-nav');
        topPlace.innerHTML = topNav.innerHTML;
    }

    // Show mobile menu
    const menuButton = document.querySelector('.dpt-trigger');
    const closeButton = document.querySelector('.t-close');
    const siteOffCanvas = document.querySelector('.site-off');

    menuButton.addEventListener('click', function (e) {
        e.preventDefault();
        siteOffCanvas.classList.toggle('showmenu');
    });

    closeButton.addEventListener('click', function () {
        siteOffCanvas.classList.remove('showmenu');
    });

    // Show submenu on mobile
    const submenuIcons = document.querySelectorAll('.has-child .icon-small');

    submenuIcons.forEach((icon) => icon.addEventListener('click', toggleSubmenu));

    function toggleSubmenu(e) {
        e.preventDefault();
        const parent = this.closest('.has-child');
        const expanded = parent.classList.contains('expand');

        submenuIcons.forEach((item) => item.closest('.has-child').classList.remove('expand'));

        if (!expanded) {
            parent.classList.add('expand');
        }
    }

    // Call copyMenu function
    copyMenu();


//slider offer
var swiper = new Swiper('.swiper-container', {
    // Optional: Add additional configuration options here
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    // Enable touch events
    touch: {
      onTouchStart: function (e) {
        // Optional: Add your custom touch start logic here
      },
      onTouchMove: function (e) {
        // Optional: Add your custom touch move logic here
      },
      onTouchEnd: function (e) {
        // Optional: Add your custom touch end logic here
      }
    }
  });
  // brands 
  const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");
const carouselChildrens = [...carousel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);

//product details
document.addEventListener("DOMContentLoaded", function () {
    const imgItems = document.querySelectorAll('.img-item');
    const showcaseImages = document.querySelectorAll('.img-showcase img');

    imgItems.forEach((item, index) => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            // Remove the 'active' class from all items
            imgItems.forEach((item) => {
                item.classList.remove('active');
            });
            // Add 'active' class to the clicked item
            item.classList.add('active');
            // Hide all showcase images
            showcaseImages.forEach((img) => {
                img.style.display = 'none';
            });
            // Display the corresponding showcase image
            showcaseImages[index].style.display = 'block';
        });
    });
});
