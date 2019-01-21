<?php

include_once __DIR__.'/../data/ConversationData.php';

/**
 * Description of ConversationBusiness
 *
 * @author Kevin Esquivel Marín <kevinEsquivel21@gmail.com>
 */
class ConversationBusiness
{
    private $conversationData;

    public function ConversationBusiness()
    {
        return $this->conversationData = new ConversationData();
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

    public function getConversation($id)
    {
        return $this->conversationData->getConversation($id);
    }

    public function getConversationsByUser($id)
    {
        return $this->conversationData->getConversationsByUser($id);
    }
}
