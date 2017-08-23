	</div> <!-- content-body -->
<div class="clearfix"></div>
	<footer class="footer fixed-bottom text-center">
	  <div class="container">
		<ul class="footer-nav">
			<li><a href="<?= base_url(); ?>">Home</a></li>
			<?php foreach($categories as $category) { ?>
			<li><a href="<?= base_url(); ?>recipe/<?= $category->url; ?>"><?= $category->name; ?></a></li>
			<?php }  ?>
		</ul>
		<p>Recipes @<?= date("Y"); ?>, All Rigths Reserved.</p>
	  </div>
	</footer>
</div>
<script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
<input type="hidden" id="base_url" value="<?= base_url(); ?>" />

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Category</h4>
      </div>
      <div class="modal-body text-center" id="caterogy-buttons">
      		<?php foreach($categories as $category) { ?>

        	<a href="<?= base_url() .'action/add/'. $category->url; ?>" class="btn btn-primary btn-circle btn-lg">
            <span><?= $category->name; ?></span>
          </a>


        	<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?= form_input(['value' => base_url(), 'type' => 'hidden', 'id' => 'base_url']); ?>
</body>
</html>