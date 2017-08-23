app.controller('RecipeController', ['CONFIG', 'recipeApi', '$scope', function(CONFIG, recipeApi, $scope) {

    $scope.base_url = CONFIG.base_url;
    $scope.empty_content = CONFIG.empty_content;

    $scope.goBack = function() {
        window.history.back();
    }

    // save or update recipe
    $scope.formSubmit = function(e) {

		var formElement = angular.element(e.target)[0];
		var recipe_id = $('#recipe_id').val();

		if (formElement.checkValidity()) {
			save(formElement, recipe_id);
		}

		e.preventDefault();

    }

    // save or update function
    var save = function(form, id) {

        var data_payload = new FormData(form);
        // Inject this hidden data outside the form, for redirection
        var category_type = $('#category_type').val();
        // initilize hide error element
        $scope.error = true;
        var params = (id) ? {method: 'save', id: id} : {method: 'save'};

        recipeApi.save(params, data_payload, function(data) {

            if (data.status == 400) {
                $scope.err_msg = data.error;
                $scope.error = false;
            } else if (data.status == 200) {
                alert('Recipe saved. Redirecting...');
                if (category_type) {
                    window.location.href = CONFIG.base_url + 'recipe/' + category_type;
                } else {
                    window.location.href = CONFIG.base_url;
                }

            } else {
                alert('Internal server error.');
            }
        });
    }

    // delete recipe
    $scope.deleteRecipe = function(id, category_id) {

        var r = confirm("Are you sure you want to delete this recipe?");
        if(r){
            recipeApi.delete({method : 'delete', id : id});

            $('#panel_'+id).parents('.panel').slideUp('slow', function(){
                $(this).remove();
                var feature_id = $('#feature_img').attr('data-id');
                // if data deleted is featured display, reload feature data
                if(feature_id == id) {
                    $scope.viewFeature();
                }

                // if home page, the first 3 latest recipies, reload data
                if($('body').data('id') == 'Home') {
                    $scope.viewLatest();
                }else {
                    $scope.viewRecipies(category_id);
                }

            })

        }
    }

    // feature layout
    $scope.viewFeature = function() {
        $scope.showFeature = true;
        recipeApi.get({method:'feature'}, function(data){
            $scope.feature = data;
            if(data.null){
                $scope.showFeature = false;
            }
        });
    }
    // home page
    $scope.viewLatest = function() {
        recipeApi.query({method:'latest'}, function(data){
            $scope.recipies = data;
        });
    }

    // appetizer, soup, main dish, dessert page
    $scope.viewRecipies = function(category_id) {
         recipeApi.query({method:'recipies', id : category_id}, function(data){
            $scope.recipies = data;
        });
    }


}]);