var app = angular.module('app', ['ngResource', 'ngSanitize']);


app.factory('CONFIG', function(){
return {
	base_url: $('#base_url').val(),
	recipies : {
		appetizer : 1,
		soup : 2,
		main_dish : 3,
		dessert : 4
	},
	empty_content : 'Recipe is empty.'
}

});


app.filter('myTextLimit', function(){

	return function(input, limit = 250) {
		// var randLimit =  Math.floor(Math.random() * ((limit+50) - limit)) + limit;
		if(input.length > limit) {
			return input.substr(0, limit)+ '...';
		}
		return input;
	}

});

// app.directive('listRecipe', [ 'recipeApi', 'CONFIG', function(recipeApi, CONFIG) {
// 	return {
// 		restrict : 'E',
// 		scope : {
// 			recipe : '=',
// 			baseUrl : '='
// 		},
// 		templateUrl : CONFIG.base_url + 'assets/js/templates/recipe.html',
// 	 	link: function(scope, elem, attrs) {

// 	 		scope.deleteRecipe = function(id) {

// 	 			var r = confirm("Are you sure you want to delete this recipe?");
// 	 			if(r){
// 	 				recipeApi.delete({method : 'delete', id : id});

// 	 				$(elem).parents('.panel').slideUp('slow', function(){
// 	 					$(this).remove();
	 					
// 	 				})


// 	 			}
	 			
// 	 		}

// 	 	}
// 	}
// }]);

