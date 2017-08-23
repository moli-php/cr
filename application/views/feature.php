
<div class="col-md-4" id="right-content" ng-controller="FeatureController">

<button class="btn btn-primary" id="feature_btn" data-toggle="modal" data-target="#myModal">Submit A Recipe</button>
<div class="panel panel-default" ng-show="showFeature">
	<div class="panel-heading">Feature Recipe</div>

	<div class="panel-body text-center" ng-cloak>
		<img id="feature_img" ng-if="!feature.image" src="<?= base_url() ?>assets/img/img.jpg" width="200"/>
		<img id="feature_img" ng-if="feature.image" data-id="{{feature.id}}" ng-src="{{feature.image}}" width="200"/>
		<div id="feature_title">
			<h3>{{feature.name}}</h3>
		</div>
	</div>



</div>
</div>
<script>

app.controller('FeatureController', [ '$scope', function(  $scope ) {
	$scope.viewFeature();
}]);

</script>
