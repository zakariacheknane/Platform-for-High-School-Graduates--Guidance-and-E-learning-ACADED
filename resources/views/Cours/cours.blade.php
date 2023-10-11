@extends('master.layout')

<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css\mycustom.css" rel="stylesheet">
<title>Cours</title>
</head>

<body class="background" >
@if(auth()->check())

<div>
<div style="margin-top:200px;">
 
<div class="w3-card-4"style="width:1300px; margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey">
  <h3>Mthematiques</h3>
</header>
<div class="w3-container w3-white" >
  <p>Mathematiques</p>
  <hr>
  <a class="c" href="{{ url('/cours2/maths') }}"><img src="images/Untitled-4.png" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
  <p>mathematique</p>
</div>

</div>

<div class="w3-card-4"style="width:1300px; margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey">
  <h3>informatique</h3>
</header>
<div class="w3-container" >
  <p>Informatique</p>
  <hr>
  <a class="c" href="{{ url('/cours2/info') }}"><img src="images/Untitled-3.png" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
  <p>Informatique</p>
</div>

</div>

<div class="w3-card-4"style="width:1300px; margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey">
  <h3>Physiques</h3>
</header>
<div class="w3-container" >
  <p>Physiques</p>
  <hr>
  <a class="c" href="{{ url('/cours2/ps') }}"><img src="images/pc.png" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
  <p>Physiques</p>
</div>

</div>

<div class="w3-card-4"style="width:1300px; margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey">
  <h3>Chimie</h3>
</header>
<div class="w3-container" >
  <p>Chimie</p>
  <hr>
  <a class="c" href="{{ url('/cours2/cm') }}"><img src="images/cm.png" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
  <p>chimie</p>
</div>

</div>

<div class="w3-card-4"style="width:1300px; margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey">
  <h3>Biologie</h3>
</header>
<div class="w3-container" >
  <p>Biologie</p>
  <hr>
  <a class="c"  href="{{ url('/cours2/bio') }}"><img src="images/bio.png" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
  <p>Biologie</p>
</div>

</div>




   

</div>

     @endif


</body>
<style>
.background{
background-image: url("images/Un.png");
width:100%;
background-repeat:no-repeat;

    }
    .c{
      text-decoration:none;
      
    }
    </style>