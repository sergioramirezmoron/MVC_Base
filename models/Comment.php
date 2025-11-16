<?php

class Comment
{

    private $id;
    private $content;
    private $date;
    private $visible;
    private $idAuthor;
    private $idPost;


    public function __construct($id, $content, $date, $visible,  $idAuthor, $idPost)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->visible = $visible;
        $this->idAuthor = $idAuthor;
        $this->idPost = $idPost;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function getAuthor()
    {
        return UserRepository::getUserById($this->idAuthor);
    }

    public function getPost()
    {
        return PostRepository::getPostById($this->idPost);
    }
}
