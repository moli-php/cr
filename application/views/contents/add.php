<div id="form-content" class="col-md-8 col-md-offset-2">
<h1 class="text-center" id="form-title"><?= $title; ?> Recipe</h1>
<?= form_open_multipart(base_url(),['class' => 'form-horizontal', 'autocomplete'=> 'off', 'id' => 'recipeform', 'ng-submit' => 'formSubmit($event)'], ['category_id' => $category_id]); ?>

  <div class="form-group">
    <label class="control-label col-sm-3" for="name">Recipe <span class="required">*</span></label>
    <div class="col-sm-9">
  
    <?= form_input(['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'placeholder' => 'Enter recipe name', 'required' => '']); ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="ingredients">Ingredients <span class="required">*</span></label>
    <div class="col-sm-9"> 
    <?= form_textarea(['class' => 'form-control', 'name' => 'ingredients', 'id' => 'ingredients', 'rows' => 6, 'placeholder' => 'Enter your ingredients', 'required' => '']) ?>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-3" for="directions">Directions <span class="required">*</span></label>
    <div class="col-sm-9">
     <?= form_textarea(['class' => 'form-control', 'name' => 'directions', 'id' => 'directions', 'rows' => 6, 'placeholder' => 'Enter directions', 'required' => '']) ?>
    </div>
  </div>

  <div class="form-group">
  	 <label class="control-label col-sm-3" for="directions">Preparation time <span class="required">*</span></label>
  	 <div class="col-sm-9">
  	 <?= form_dropdown('preparation_time', $options, '', ['class' => 'form-control', 'required' => '']); ?>
  	 </div>
  </div>

  <div class="form-group">
  	 <label class="control-label col-sm-3" for="directions">Upload recipe <span class="required">*</span></label>
  	 <div class="col-sm-9">
				<span ng-hide="error" ng-bind-html="err_msg"></span>
		  	 <div class="text-secondary"><i>Note : 2mb max size and dimension 1920 x 1920 max</i></div>
			<?= form_upload(['name'=> 'image', 'class' => 'form-control', 'required' => '', 'file-input' => 'files']); ?>
  	 </div>
  </div>

 

  <div class="form-group"> 
    <div class="col-sm-offset-9 col-sm-12">
      <button type="submit" class="btn btn-primary">Submit</button>
      <?= anchor(base_url(), 'Cancel', ['class' => 'btn btn-default']); ?>
    </div>
  </div>
</form>
   <?= form_input(['type'=> 'hidden', 'id' => 'category_type', 'value' => $this->uri->segment(3,0)]); ?>
</div>
