<?php

include_once __DIR__.'/../data/CommentData.php';

/**
 * Description of CommentBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
class CommentBusiness
{
    private $conversationData;

    public function CommentBusiness()
    {
        return $this->conversationData = new CommentData();
    }

    public function insert($conversation)
    {
        return $this->conversationData->insert($conversation);
    }

    public function update($conversation)
    {
        return $this->conversationData->update($conversation);
    }

    public function delete($id)
    {
        return $this->conversationData->delete($id);
    }

    public function getAll()
    {
        return $this->conversationData->getAll();
    }

    public function getComment($id)
    {
        return $this->conversationData->getComment($id);
    }

    public function getCommentsByUser($id)
    {
        return $this->conversationData->getCommentsByUser($id);
    }

}
