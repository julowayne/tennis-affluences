<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3>Bonjour,</h3>
  <p>Vous avez annulé votre terrain pour le <span id="date">{{Carbon\Carbon::parse($date)->format('d-m-Y à H:m')}}.</span> </p>
  <p>Envie de réserver à nouvea ? Aucun problème suivez ce bouton pour <button><a href="{{route('reservation'}}" target="_blank" >réserver</a></button>.</p>
  </div>
  <div id="contact">
    En cas de problème avec le club ou votre réservation, n'hésitez pas a nous contacter au 01 83 37 37 54 ou par mail tennis-club@tennis.com
  </div>

</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
#date {
  font-size: 1rem;
  font-weight: bold;
}
#contact {
  margin-top: 10px;
}
button {
  width: 110px;
  font-size: 1rem;
  border-radius: 4px;
  background-color: #fd7e14;
  border: none;
  box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
  padding: 4px 8px;
  cursor: pointer;
}
button:focus {
  border:none;
}
</style>