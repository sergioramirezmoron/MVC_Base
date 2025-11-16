<?php 
// deleteComment
if (isset($_GET['deleteComment'])) {
    CommentRepository::deleteComment($_GET['deleteComment']);
    header('location:index.php?c=post&id=' . $_GET['id']);
    exit;
}

// addComment
if (isset($_POST['content'])) {
    $id = CommentRepository::addComment($_POST['content']);
    header('location:index.php?c=post&id=' . $_GET['id']);
    exit;
}
