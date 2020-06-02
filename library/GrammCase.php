<?php

/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 26.2.2017
 * Time: 11:25
 */
class GrammCase
{
    private $word;
    private $length;
    private $lastOne;
    private $lastTwo;

    /**
     * GrammCase constructor.
     * NOTE: Given word must be in nominative!
     *
     * @param $word
     */
    public function __construct($word)
    {
        $this->word = $word;
        $this->length = strlen($word);
        $this->lastOne = substr($word, -1);
        $this->lastTwo = substr($word, -2);
    }


    /**
     * Replace last letters for new one
     *
     * @param $additional
     * @param int $cutLast
     * @return string
     */
    public function changeLast($additional, $cutLast = 0)
    {
        return substr($this->word, 0, $this->length - $cutLast) . $additional;
    }


    /**
     * Case: Nominative
     * Indicates: Subject of a finite verb
     * Questions: Ko, što
     *
     * @return mixed
     */
    public function nominative()
    {
        return $this->word;
    }


    /**
     * Case: Genitive
     * Indicates: Possessor of another noun
     * Questions: Koga, cega
     *
     * @return mixed
     */
    public function genitive()
    {
        // ToDo Implementation

        return '';
    }


    /**
     * Case: Dative
     * Indicates: Indirect object of a verb
     * Questions: Kome, cemu
     *
     * @return mixed
     */
    public function dative()
    {
        switch ($this->lastTwo) {
            case 'ar':
                return $this->changeLast('ru', 2);
        }

        switch ($this->lastOne) {
            case 'a':
                return $this->changeLast('i', 1);
            case 'i':
                return $this->changeLast('ju');
            case 'o':
            case 'e':
                return $this->changeLast('u', 1);
            case 'n':
            case 't':
            case 'v':
            case 'r':
            case 's':
            case 'g':
            case 'k':
                return $this->changeLast('u');
            default:
                return $this->word;
        }
    }


    /**
     * Case: Accusative
     * Indicates: Direct object of a transitive verb
     * Questions: Koga, sta
     *
     * @return mixed
     */
    public function accusative()
    {
        /**
         * Check for last two letters
         */
        switch ($this->lastTwo) {
            case 'ar':
                return $this->changeLast('ra', 2);
                break;
        }

        switch ($this->lastOne) {
            case 'a':
                return $this->changeLast('u', 1);
            case 'i':
                return $this->changeLast('ja');
            case 'o':
            case 'e':
                return $this->changeLast('a', 1);
            case 'n':
            case 't':
            case 'v':
            case 'r':
            case 's':
            case 'g':
            case 'k':
                return $this->changeLast('a');
            default:
                return $this->word;
        }
    }

    /**
     * Case: Vocative
     * Indicates: Addressee
     * Questions: Hej
     *
     * @return string
     */
    public function vocative()
    {
        switch ($this->lastTwo) {
            case 'da':
            case 'sa':
                return $this->changeLast('o', 1);
            case 'ca':
                return $this->changeLast('e', 1);
            case 'ar':
                return $this->changeLast('re', 2);
        }

        switch ($this->lastOne) {
            case 'n':
            case 't':
            case 'v':
            case 'r':
            case 's':
                return $this->changeLast('e');
            case 'g':
                return $this->changeLast('že', 1);
            case 'k':
                return $this->changeLast('če', 1);
            default:
                return $this->word;
        }
    }

    /**
     * Case: Instrumental
     * Indicates: An object used in performing an action
     * Questions: S kim, cim
     *
     * @return string
     */
    public function instrumental()
    {
        switch ($this->lastTwo) {
            case 'ar':
                return $this->changeLast('rom', 2);
        }

        switch ($this->lastOne) {
            case 'o':
            case 'a':
                return $this->changeLast('om', 1);
            case 'i':
                return $this->changeLast('jem');
            case 'r':
            case 'k':
            case 'g':
            case 'v':
            case 'n':
            case 't':
                return $this->changeLast('om');
            case 'e':
                return $this->changeLast('m');
            default:
                return $this->word;
        }
    }

    /**
     * Case: Locative
     * Indicates: Location
     * Questions: Gde, O kome, o cemu
     *
     * @return mixed
     */
    public function locative()
    {
        switch ($this->lastTwo) {
            case 'ar':
                return $this->changeLast('ru', 2);
        }

        switch ($this->lastOne) {
            case 'a':
                return $this->changeLast('i', 1);
            case 'i':
                return $this->changeLast('ju');
            case 'e':
            case 'o':
                return $this->changeLast('u', 1);
            case 'g':
            case 'k':
            case 't':
            case 'r':
            case 'n':
            case 'v':
                return $this->changeLast('u');
            default:
                return $this->word;
        }
    }
}
