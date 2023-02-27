
const carousel = document.querySelector('.carousel');
const carouselItems = document.querySelectorAll('.carousel-item');

let currentItem = 0;

function setActiveItems() {
  for (let i = 0; i < carouselItems.length; i++) {
    carouselItems[i].classList.remove('active', 'previous', 'next');
  }

  carouselItems[currentItem].classList.add('active');

  if (currentItem === 0) {
    carouselItems[carouselItems.length - 1].classList.add('previous');
    carouselItems[currentItem + 1].classList.add('next');
  } else if (currentItem === carouselItems.length - 1) {
    carouselItems[currentItem - 1].classList.add('previous');
    carouselItems[0].classList.add('next');
  } else {
    carouselItems[currentItem - 1].classList.add('previous');
    carouselItems[currentItem + 1].classList.add('next');
  }
}

setActiveItems();

function moveToNextItem() {
  currentItem++;

  if (currentItem > carouselItems.length - 1) {
    currentItem = 0;
  }

  setActiveItems();
}

setInterval(moveToNextItem, 5000);
