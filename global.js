var categories = ["Entrée","Repas","Dessert","Pain","Conseil","Sauce","Boisson"]
var app = angular.module('myApp',[]);
app.controller("inedexCtrl",function($scope, $http, $sce) {
	$scope.categories = categories;
});