function AppCtrl($scope, $rootScope, AuthService) {
  $scope.theme = "//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css";
  //AuthService.isLoggedIn();
  //console.log($rootScope.auth);
}

function HomeCtrl ($scope, $routeParams, MovieService) {

}

function RandomCtrl ($scope, AuthService) {

}

function AuthCtrl ($scope, AuthService, $location){

  $scope.credentials = {
    email: '',
    password: ''
  };

  $scope.register = function(credentials){
    AuthService.register(credentials);
  };

  $scope.login = function(credentials){
    AuthService.login(credentials).success(function() {
      $location.path('/random');
    });
  };

  $scope.logout = function(){
    AuthService.logout().success(function() {
      $location.path('/login');
    });
  };

}

function MoviesCtrl ($scope, $routeParams, MovieService, SearchService) {

  $scope.search = SearchService.criteria;

  MovieService.getGenres().success(function(data,status){
    $scope.genres = data;
  });

  $scope.$watch('search', function() {
    MovieService.getMovies($scope.search).success(function(data,status){
      $scope.count = data.MovieCount;
      $scope.pager = data.MovieCount / $scope.search.limit;
      $scope.movies = data.MovieList;
    });
  }, true);

}

function MovieCtrl ($scope, movie) {

  $scope.movieData = movie.data;
  //console.log(movie.data);

}


angular.module('ytsApp').controller('AppCtrl', ['$scope', '$rootScope', 'AuthService', AppCtrl]);
angular.module('ytsApp').controller('HomeCtrl', ['$scope', '$routeParams', 'MovieService', HomeCtrl]);
angular.module('ytsApp').controller('RandomCtrl', ['$scope', 'AuthService', RandomCtrl]);
angular.module('ytsApp').controller('AuthCtrl', ['$scope', 'AuthService', '$location', AuthCtrl]);
angular.module('ytsApp').controller('MoviesCtrl', ['$scope', '$routeParams', 'MovieService', 'SearchService', MoviesCtrl]);
angular.module('ytsApp').controller('MovieCtrl', ['$scope', 'movie', MovieCtrl]);
