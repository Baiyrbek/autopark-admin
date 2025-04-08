$(window).ready(function () {
  $("#body").load("./pages/brands.php");
});

$(".menu__item").click(function () {
  $("#body").load("./pages/" + $(this).attr("page"));
  $(".menu__item").removeClass('active')
  $(this).addClass('active')
  $(this).parents('.menu').toggle(300)
});
