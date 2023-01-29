<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calculatrice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <h1>Simple Calculatrice</h1>
        <form action="" method="POST">
            @csrf
           <div class="mb-3">
                <input name="nb1" type="number" class="form-control" id="exampleFormControlInput1" placeholder="1er chiffre">
           </div>
           <div class="mb-3">
           <select name='operateur' class="form-select" aria-label="Default select example">
            <option  {{ (isset($operateur) && $operateur=="+")?"selected":"" }}>+</option>
            <option  {{ (isset($operateur) && $operateur=="-")?"selected":"" }} >-</option>
            <option  {{ (isset($operateur) && $operateur=="*")?"selected":"" }} >*</option>
            <option  {{ (isset($operateur) && $operateur=="/")?"selected":"" }} >/</option>
            <option  {{ (isset($operateur) && $operateur=="%")?"selected":"" }} >%</option>
          </select>
          </div>
           <div class="mb-3">
             <input name="nb2" type="number" class="form-control" id="exampleFormControlInput1" placeholder="2ème chiffre">
           </div>
           <button type="submit" class="btn btn-primary">Calculer</button>
        </form>
        <div><span>Reponse : {{$result}}</span></div>
        </div>
    </body>
</html>