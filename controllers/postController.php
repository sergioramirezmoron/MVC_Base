<?php

// deletePost
if (isset($_GET['deletePost'])) {
    PostRepository::deletePost($_GET['deletePost']);
    header('location:index.php');
}

// addPost
if (isset($_POST['title']) && isset($_POST['content'])) {
    $id = PostRepository::addPost($_POST['title'], $_POST['content']);
    header('location:index.php?c=post&id=' . $id);
}
if (isset($_GET['createPost'])) {
    require_once('views/createPostView.phtml');
}

// getPostById
if (isset($_GET['id'])) {
    $post = PostRepository::getPostById($_GET['id']);
    require_once('views/postView.phtml');
}
