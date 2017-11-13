<h2><?php echo $title; ?></h2>

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

<ul class="menu">
<?php foreach ($menu_list as $menu): ?>
		<a class="menu" href="<?php echo site_url($menu['menuUrl']);?>"><?php echo $menu['menuTitle'];?></a>
<?php endforeach; ?>
</ul>
<div class="main">
<table>
    <tr>
        <th>Author</th>
        <th>Title</th>
        <th>Year</th>
        <th>Description</th>
        <th>Genre</th>
        <th colspan="2">Action</th>
    </tr>

<?php foreach ($books as $book): ?>
    <tr>
        <td><?= $book["bookAuthor"]; ?></td>
        <td><?= $book["bookTitle"]; ?></td>
        <td><?= $book["bookYear"]; ?></td>
        <td><?= $book["bookDesc"]; ?></td>
        <td><?= $book["bookGenre"]; ?></td>
        <td><?php echo '<a href="'.site_url('book/edit').'/'.$book["bookID"].'">Edit</a>'; ?></td>
        <td><?php echo '<a href="'. site_url('book/delete').'/'.$book["bookID"].'">Delete</a>'; ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>