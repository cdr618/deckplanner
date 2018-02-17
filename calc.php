<?php
$length=$_POST
function calcAreaRect($length,$width){
	return ($length*$width);
}
function calcAreaLandU($lengthL, $lengthS, $widthL, $widthS){
	return (($lengthL*$widthL)-($lengthS*$widthS));
}

function calcWood($deckArea, $boardArea){
	return (ceil($deckArea/$boardArea));

}
function calcPostsRect($deckLength, $deckWidth){
	$scLength=1.8288;
	$maxpostDistance=2.4384;
	return ((ceil(($deckLength-$scLength)/$maxpostDistance))+(ceil($deckLength)/$maxpostDistance)+(2*(ceil($deckwidth)/$maxpostDistance));
}

function calcPrice($deckHeight, $numBoards, $woodType, $numPosts, $postType, $railLength, $railType, $stainType, $deckArea){
	

include('deckProducer.php');
?>
