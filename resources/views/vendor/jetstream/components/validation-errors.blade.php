<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css\mycustom.css" rel="stylesheet">

</head>


@if ($errors->any())
    <div {{ $attributes }}>

        <div  class="erreur">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            </div>
    </div>
@endif
