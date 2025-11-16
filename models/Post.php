<?php

class Post
{

    private $id;
    private $title;
    private $content;
    private $date;
    private $visible;
    private $idAuthor;


    public function __construct($id, $title, $content, $date, $visible,  $idAuthor)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->visible = $visible;
        $this->idAuthor = $idAuthor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
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

    public function getComments()
    {
        return CommentRepository::getCommentsByPostId($this->getId());
    }
}
