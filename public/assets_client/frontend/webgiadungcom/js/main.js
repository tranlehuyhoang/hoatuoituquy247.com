if($('.menu__cate').length) {
  let menuEle = $('.menu__cate').prop('outerHTML');
  $('.slider__body').prepend(menuEle);
}