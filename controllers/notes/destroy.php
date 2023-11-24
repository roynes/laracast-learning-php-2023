<?php
use Core\App;

$config = require base_path('config.php');
$currentUserId = 1;
$note = db()->query('select * from notes where id = :id', ['id' => $_POST['id']])
           ->findOrFail();
           
authorize($note['user_id'] === $currentUserId);

db()->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
]);

header('location: /notes');
exit();