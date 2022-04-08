<?php

class Answer
{
    private int $id;

    private string $text;

    private bool $isTheGoodAnswer;

    private int $id_question;

    public function __construct(int $id, string $text, bool $isTheGoodAnswer = false, int $id_question )
    {
        $this->setText($text)->setIsTheGoodAnswer($isTheGoodAnswer);
    }

    // TODO : ajouter les propriétés

    // TODO : ajouter les méthodes


    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of isTheGoodAnswer
     */ 
    public function getIsTheGoodAnswer()
    {
        return $this->is_the_good;
    }

    /**
     * Set the value of isTheGoodAnswer
     *
     * @return  self
     */ 
    public function setIsTheGoodAnswer($isTheGoodAnswer)
    {
        $this->is_the_good = $isTheGoodAnswer;

        return $this;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of id
     */ 
    public function getIdQuestion()
    {
        return $this->id_question;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdQuestion($id)
    {
        $this->id = $id_question;

        return $this;
    }
}
