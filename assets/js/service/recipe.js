app.service('recipeApi', ['$resource', 'CONFIG', function($resource, CONFIG){
		return $resource(CONFIG.base_url + 'api/:method/:id', {}, {
			update : {
				method : 'PUT',
			},
			get : {
				method : 'GET',
				isArray : false,
				transformResponse : function(data, headerGetter) {
					if(data === 'null' || data == 0) {
						return {null : true};
					}
					return angular.fromJson(data);
				}
			},
			save : {
				method : 'POST',
				isArray : false,
			 	transformRequest: angular.identity,
				headers: {'Content-Type': undefined,'Process-Data': false},

			}
		});
}]);