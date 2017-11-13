<h2><?php echo $title; ?></h2>

	<?php
	echo validation_errors(); 
	?>


<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/Style.css">


<ul class="menu">
<?php foreach ($menu_list as $menu): ?>
		<a class="menu" href="<?php echo site_url($menu['menuUrl']);?>"><?php echo $menu['menuTitle'];?></a>
<?php endforeach; ?>
</ul>
<div id="form">
<?php echo form_open('book/create'); ?>
	<div class="labels">
    <label for="author">Author</label>
    <input class="float" type="input" name="author" /><br />
	</div>
	<div class="labels">
    <label for="title">Title</label>
    <input class="float" type="input" name="title" /><br />
	</div>
	<div class="labels">
    <label for="year">Year</label>
    <input class="float" type="input" name="year" /><br />
	</div>
	<div class="labels">
    <label for="description">Description</label>
    <input class="float" type="input" name="description" /><br />
	</div>
	<div class="labels">
    <label for="genre">Genre</label>
    <input class="float" type="input" name="genre" /><br />
	</div>
    <input type="submit" name="submit" value="Add Book" />

</form></div>