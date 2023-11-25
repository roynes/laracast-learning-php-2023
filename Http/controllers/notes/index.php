<?php
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

try {
    $notes = $db->query('select * from notes where user_id = 1')->get();
} catch (Exception $e) {
    dd($e);
}

view('notes/index', [
    'header' => 'My Notes',
    'notes' => $notes
]);