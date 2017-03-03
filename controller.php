<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 26.2.2017
 * Time: 11:23
 */

/*
 * Including library
 * Note: You will use autoload
 */
include('library/GrammCase.php');

session_start();
/*
 * Default prepared array
 */
$results = [];

/*
 * List of names for testing
 */
$names = [
    'Nemanja',
    'Marko',
    'Djordje',
    'Dragoslav',
    'Zoran',
    'Miodrag',
    'Novak',
    'Petar',
    'Petra',
    'Nikola',
    'Igor',
    'Vladislav',
    'Neven',
    'Nevena',
    'Ignjat',
    'Zlatomir',
    'Buda',
];


/*
 * Catch POST and store in SESSION global variable
 */
if(isset($_POST['add'])){
    $word = $_POST['word'];

    $_SESSION[$word] = $word;
}

/*
 * Merge saved names with default names array
 */
$names = array_merge($names, $_SESSION);


/*
 * Prepare array for view
 */
foreach ($names as $key => $name) {

    $grammCase = new GrammCase($name);

    $wordGenitive       = $grammCase->genitive();
    $wordDative         = $grammCase->dative();
    $wordAccusative     = $grammCase->accusative();
    $wordVocative       = $grammCase->vocative();
    $wordInstrumental   = $grammCase->instrumental();
    $wordLocative       = $grammCase->locative();

    $results[$key]['nominative']    = $name;
    $results[$key]['genitive']      = $wordGenitive;
    $results[$key]['dative']        = $wordDative;
    $results[$key]['accusative']    = $wordAccusative;
    $results[$key]['vocative']      = $wordVocative;
    $results[$key]['instrumental']  = $wordInstrumental;
    $results[$key]['locative']      = $wordLocative;
}
