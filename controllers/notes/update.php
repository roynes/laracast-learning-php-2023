<?php
use Core\Validator;

$config = require base_path('config.php');
$currentUserId = 2;
$errors = [];

$note = db()->query('select * from notes where id = :id', ['id' => $_POST['id']])
           ->findOrFail();
           
authorize($note['user_id'] === $currentUserId);

if(! Validator::string($_POST['body'], 1, 300)) {
    $errors['body'] = 'A body of no less than 1 and no more than 1,000 characters is required';
}

if(!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Update Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

db()->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header("location: /notes");
exit();
