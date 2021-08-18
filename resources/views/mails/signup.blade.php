<html>
    <head>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    </head>
    <body>
        {{-- De assets helper verwijst naar de public folders
        Dit dient om de afbeeldingen via een URL toegankelijk te maken in de mails --}}
        <img src="{{ asset('assets/img/logo.png')}}" width="150px" alt="">
        <h1>Bedankt voor uw inschrijving</h1>
        
        <div><b>Uw Naam: </b> {{$validate->name}}</div>
        <div><b>Uw Email: </b> {{$validate->email}}</div>
        <div><b>Uw Telefoon: </b> {{$validate->phone}}</div>
        
        <div>Bedankt voor het vertrouwen...</div>
    </body>
</html>