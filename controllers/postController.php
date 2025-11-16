<?php

// deletePost
if (isset($_GET['deletePost'])) {
    PostRepository::deletePost($_GET['deletePost']);
    header('location:index.php');
    exit;
}

// updatePost
if (isset($_POST['title']) && isset($_POST['content']) && isset($_GET['updatePost'])) {
    PostRepository::updatePost($_GET['updatePost'], $_POST['title'], $_POST['content']);
    header('location:index.php?c=post&id=' . $_GET['updatePost']);
    exit;
}

if (isset($_GET['updatePost'])) {
    $post = PostRepository::getPostById($_GET['updatePost']);
    require_once('views/updatePostView.phtml');
    exit;
}

// addPost
if (isset($_POST['title']) && isset($_POST['content'])) {
    $id = PostRepository::addPost($_POST['title'], $_POST['content']);
    header('location:index.php?c=post&id=' . $id);
    exit;
}
if (isset($_GET['createPost'])) {
    require_once('views/createPostView.phtml');
    exit;
}

// getPostById
if (isset($_GET['id'])) {
    $post = PostRepository::getPostById($_GET['id']);
    require_once('views/postView.phtml');
    exit;
}


