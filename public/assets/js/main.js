angular.module('ytsApp', ['ngRoute', 'ngAnimate', 'firebase']);

angular.module('ytsApp')
  .config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/home', {
      templateUrl: 'assets/partials/home.html',
      controller: 'HomeCtrl'
    });
    $routeProvider.when('/login', {
      templateUrl: 'assets/partials/login.html',
      controller: 'AuthCtrl'
    });
    $routeProvider.when('/logout', {
      template: '',
      controller: 'AuthCtrl'
    });
    $routeProvider.when('/register', {
      templateUrl: 'assets/partials/register.html',
      controller: 'AuthCtrl'
    });
    $routeProvider.when('/random', {
      templateUrl: 'assets/partials/random.html',
      controller: 'RandomCtrl'
    });
    $routeProvider.when('/movies', {
      templateUrl: 'assets/partials/movies.html',
      controller: 'MoviesCtrl'
    });
    $routeProvider.when('/movies/genre/:genre', {
      templateUrl: 'assets/partials/movies.html',
      controller: 'MoviesCtrl'
    });
    $routeProvider.when('/movie/:id', {
      templateUrl: 'assets/partials/movie.html',
      controller: 'MovieCtrl',
      resolve: {
        movie: function(MovieService, $route){
          return MovieService.getSingleMovie($route.current.params.id);
        }
      }
    });
    $routeProvider.otherwise({ redirectTo: '/home' });
  }])
  .run(["$rootScope", "$location", "AuthService", "FlashService", function($rootScope, $location, AuthService, FlashService) {

    var routesThatRequireAuth = ['/random'];
    var isLoggedIn = AuthService.isLoggedIn();
    console.log(isLoggedIn);
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
      if(_(routesThatRequireAuth).contains($location.path()) && !AuthService.isLoggedIn()) {
        $location.path('/login');
        FlashService.show("Please log in to continue.", "danger");
      }
    });

  }]);