
<div id="full-content" ng-controller="DetailsController">
    <div class="tse-scrollable wrapper">
        <div class="tse-content">

            <div class="panel panel-default" ng-if="!recipe.null" ng-cloak>
                <div class="panel-body ">
                    <div id="back-btn" class="pull-left" title="Go Back" ng-click="goBack()"></div>
                    <div class="image-container-details">
                        <img ng-src="{{recipe.image}}">
                    </div>
                    <div>
                        <h4 id="title">{{recipe.name}}</h4>
                        <div id="category">{{recipe.category_name}}</div>
                        <div id="ingredient">Preparation Time</div>
                        <p>{{recipe.preparation_time}}</p>
                        <div id="ingredient">Ingredients</div>
                        <p id="ingredient-text">{{recipe.ingredients}}</p>
                        <div id="ingredient">Directions</div>
                        <p id="ingredient-text">{{recipe.directions}}</p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" ng-if="recipe.null" ng-cloak>
                    <div class="panel-body text-center">
                    <h3>Record not found.</h3>
                    </div>
            </div>

        </div>
    </div>
</div>

<script>
"use strict";

app.controller('DetailsController', ['CONFIG', 'recipeApi', '$scope', function( CONFIG, recipeApi, $scope ) {

    recipeApi.get({method:'recipe', id : <?= $id; ?>}, function(data){
        $scope.recipe = data;
    });



}]);

// nice scroll
$('.wrapper').TrackpadScrollEmulator();


</script>