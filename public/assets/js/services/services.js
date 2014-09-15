function AuthService ($http, $location, FlashService, SessionService, $rootScope) {

  var AuthService = {};

  AuthService.login = function (credentials) {
    FlashService.clear();

    var login = $http.post('auth/login', credentials);
    login.success(function(data, status, headers, config) {
      SessionService.set('authenticated', true);
      $rootScope.auth = {
        user: data
      };
    });
    login.error(function(data, status, headers, config) {
      FlashService.show('Login Error! ' + data.flash + ' [' + status + ']', 'danger');
    });
    return login;

  };

  AuthService.logout = function () {
    var logout = $http.get('auth/logout');
    logout.success(function(data, status, headers, config) {
      SessionService.unset('authenticated');
    });
    return logout;
  }

  AuthService.register = function (credentials) {

  };

  AuthService.isLoggedIn = function () {
    var isLoggedIn = $http.get('auth/check');
    isLoggedIn.success(function(data, status, headers, config) {
      console.log(data);
      $rootScope.auth = data;
    });
    return isLoggedIn;
    //return SessionService.get('authenticated');
  };

  return AuthService;
}

function FlashService ($rootScope) {
  var FlashService = {};
  FlashService.show = function (message, status) {
    $rootScope.flash = {
      message: message,
      status: status
    };
  };
  FlashService.clear = function () {
    $rootScope.flash = {};
  };
  return FlashService;
}

function SessionService () {
  var SessionService = {};
  SessionService.get = function(key) {
    return sessionStorage.getItem(key);
  };
  SessionService.set = function(key, val) {
    return sessionStorage.setItem(key, val);
  };
  SessionService.unset = function(key) {
    return sessionStorage.removeItem(key);
  };
  return SessionService;
}

function MovieService ($http) {
  var MovieService = {};

  MovieService.getSingleMovie = function (id) {
    var url = "/movie/" + id;
    return $http.get(url);
  };

  MovieService.getMovies = function (filter) {
    var params = "";
    for (var key in filter) {
      if (filter.hasOwnProperty(key)) {
        params += "/" + filter[key];
      }
    }
    var url = "/movies" + params;
    return $http.get(url);
  };

  MovieService.getGenres = function () {
    var url = "/genres";
    return $http.get(url);
  };

  MovieService.getSingleMovieDirect = function (id) {
    var url = "https://yts.re/api/movie.jsonp?id=" + id + "&callback=JSON_CALLBACK";
    return $http.jsonp(url);
  };

  MovieService.getMoviesDirect = function (filter) {
    var params = "";
    for (var key in filter) {
      if (filter.hasOwnProperty(key)) {
        params += "&" + key + "=" + filter[key];
      }
    }
    var url = "https://yts.re/api/list.jsonp?callback=JSON_CALLBACK" + params;
    return $http.jsonp(url);
  };

  return MovieService;
}

function SearchService () {
  var SearchService = {};
  SearchService.criteria = {genre: "All", quality: "All", limit: 20, sort: "date"};
  return SearchService;
}

angular.module('ytsApp').factory('SessionService', SessionService);
angular.module('ytsApp').factory('FlashService', FlashService);
angular.module('ytsApp').factory('AuthService', AuthService);
angular.module('ytsApp').factory('SearchService', SearchService);
angular.module('ytsApp').factory('MovieService', MovieService);