<h2><?php echo $title; ?></h2>

	<?php
	echo validation_errors(); 
	?>


<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/EditStyle.css">


<ul class="menu">
<?php foreach ($menu_list as $menu): ?>
		<a class="menu" href="<?php echo site_url($menu['menuUrl']);?>"><?php echo $menu['menuTitle'];?></a>
<?php endforeach; ?>
</ul>
<?php echo form_open('book/edit/'.$id); ?>

<?php foreach ($books as $book): ?>
	<?php
	if ($book['bookID'] === $this->uri->segment(3)) { ?>

<div id="form">
	<div class="labels">
    <label for="author">Author</label>
    <input class="float" type="input" name="author" value="<?php echo $book['bookAuthor']; ?>" /><br />
	</div>

	<div class="labels">
    <label for="title">Title</label>
    <input class="float" type="input" name="title" value="<?php echo $book['bookTitle']; ?>" /><br />
	</div>

	<div class="labels">
    <label for="year">Year</label>
    <input class="float" type="input" name="year" value="<?php echo $book['bookYear']; ?>" /><br />
	</div>

	<div class="labels">
    <label for="description">Description</label>
    <input class="float" type="input" name="description" value="<?php echo $book['bookDesc']; ?>" /><br />
	</div>

	<div class="labels">
    <label for="genre">Genre</label>
    <input class="float" type="input" name="genre" value="<?php echo $book['bookGenre']; ?>" /><br />
	</div>

    <input id="submit" type="submit" name="submit" value="Edit Book" />

</div>
	<?php } ?>
<?php endforeach; ?>
</form>