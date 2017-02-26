<?php

/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 26.2.2017
 * Time: 11:25
 */
class GrammCase
{

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
     *
     * @return mixed
     */
    public function genitive()
    {

        return '';
    }


    /**
     * Case: Dative
     *
     * @return mixed
     */
    public function dative()
    {

        return '';
    }


    /**
     * Case: Accusative
     *
     * @return mixed
     */
    public function accusative()
    {


        return '';
    }


    /**
     * Case: Vocative
     * Indicates: Addressee
     *
     * @return string
     */
    public function vocative()
    {


        $tmpWord    = $this->word;
        $totalChars = $this->length;
        $usedCase = false;


        switch ($this->lastTwo) {
            case 'da':
            case 'sa':
                $tmpWord = substr($tmpWord, 0, $totalChars-1) . 'o';
                $usedCase = 1;
                break;
            case 'ca':
                $tmpWord = substr($tmpWord, 0, $totalChars-1) . 'e';
                $usedCase = 2;
                break;
            case 'ar':
                $tmpWord = substr($tmpWord, 0, $totalChars-2) . 're';
                $usedCase = 3;
                break;
        }


        if (!$usedCase) {
            switch ($this->lastOne) {
                case 'n':
                case 't':
                case 'v':
                case 'r':
                case 's':
                    $tmpWord .= 'e';
                    break;
                case 'g':
                    $tmpWord = substr($tmpWord, 0, $totalChars-1) . 'že';
            }
        }


        return $tmpWord;

    }


    /**
     * Case: Instrumental
     * Indicates: An object used in performing an action
     *
     * @return string
     */
    public function instrumental()
    {

        $tmpWord = $this->word;
        $usedCase = false;



        switch ($this->lastTwo) {
            case 'ar':
                $tmpWord = substr($tmpWord, 0, $this->length - 2) . 'rom';
                $usedCase = 1;
                break;
        }


        if (!$usedCase) {
            switch ($this->lastOne) {
                case 'o':
                case 'a':
                    $tmpWord = substr($tmpWord, 0, $this->length - 1) . 'om';
                    break;
                case 'r':
                case 'g':
                case 'v':
                case 'n':
                    $tmpWord = $tmpWord . 'om';
                    break;
                case 'e':
                    $tmpWord .= 'm';
                    break;
            }
        }



        return $tmpWord;
    }


    /**
     * Case: Locative
     * Indicates: Location
     *
     * @return mixed
     */
    public function locative()
    {

        $tmpWord = $this->word;
        $usedCase = false;



        switch ($this->lastTwo) {
            case 'ar':
                $tmpWord = substr($tmpWord, 0, $this->length - 2) . 'ru';
                $usedCase = 1;
                break;


        }



        if (!$usedCase) {
            switch ($this->lastOne) {
                case 'a':
                    $tmpWord = substr($tmpWord, 0, $this->length - 1) . 'i';
                    break;
                case 'e':
                case 'o':
                    $tmpWord = substr($tmpWord, 0, $this->length - 1) . 'u';
                    break;

                case 'g':
                case 't':
                case 'r':
                case 'n':
                case 'v':
                    $tmpWord .= 'u';
                    break;

            }
        }



        return $tmpWord;
    }

}