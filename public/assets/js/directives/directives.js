// use a directive
function helloWorld () {
  return {
    restrict: 'AE',
    replace: true,
    template: '<p style="background-color:{{color}}">Hello World',
    link: function(scope, elem, attrs) {
      elem.bind('click', function() {
        elem.css('background-color', 'green');
      });
      elem.bind('mouseover', function() {
        elem.css('cursor', 'pointer');
      });
    }
  };
}

function movieData () {
  return {
    restrict: 'E',
    templateUrl: 'assets/partials/movie-data.html'
  };
}

angular.module('ytsApp').directive('movieData', movieData);
angular.module('ytsApp').directive('helloWorld', helloWorld);