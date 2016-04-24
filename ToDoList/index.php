<?php

require_once 'app/init.php';

$itemQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user= :user
");

$itemQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

foreach($items as $item){
	print_r($item);
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>TO DO List</title>

		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">

		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

	</head>
	<body>
		<div class="list">
			<h1 class="header">To Do List</h1>

			<?php if(!empty($items)) : ?>

			<?php if(!empty($items)): ?>
			<ul class="items">
				<li>
					<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
					<?php if(!$item['done']): ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
				<?php endif; ?>
				</li>
			<?php endforeach; ?>
			</ul>
		
		<?php else: ?>
			<p>You haven't added any items yet.</p>
		<?php endif; ?>

			<form class="item-add" action="add.php" method="post">
				<input tpe="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off" required>
				<input type="submit" value="Add" class="submit">
			</form>
		</div>
	</body>
</html>