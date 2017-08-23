<div class="col-md-8" id="left-content" ng-controller="PageController">
    <div class="tse-scrollable wrapper">
        <div class="tse-content">

            <div class="panel panel-default" ng-repeat="recipe in recipies" ng-if="recipies.length > 0" ng-cloak>
                <div ng-include src="'<?= base_url(); ?>assets/js/templates/recipe.html'"></div>
            </div>
           
            <div class="panel panel-default" ng-if="recipies.length == 0" ng-cloak>
                <div class="col-md-12 text-center"><h2>{{empty_content}}</h2></div>
            </div>

        </div>
    </div>
</div>
<script>
app.controller('PageController', ['CONFIG', '$scope', function( CONFIG, $scope ) {

    $scope.viewRecipies(CONFIG.recipies.dessert);

}]);

// nice scroll
$('.wrapper').TrackpadScrollEmulator();

</script>
