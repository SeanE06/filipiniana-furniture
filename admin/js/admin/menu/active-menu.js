$(document).ready(function () {
  var url = window.location.href.split(location.search||location.hash||/[?#]/)[0];
  var element = $('ul.nav a').filter(function () {
    return this.href == url;
  });
  if(element){
    element.addClass('active').parents('#side-menu ul').addClass('in');
    element.parents('#side-menu li').addClass('active');
  } 
});