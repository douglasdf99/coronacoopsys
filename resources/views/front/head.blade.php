<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta property="og:url"           content="https://www.cooperabrasil.coop.br/" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Coopera Brasil" />
  <meta property="og:description"   content="Uma grande rede nacional de cooperativas onde você encontra os produtos e serviços que procura. Esse é o CooperaBrasil: uma iniciativa do Sistema OCB para conectar cooperativas, sociedade e estimular a intercooperação! Uma oportunidade para as pessoas encontrarem produtos e serviços de cooperativas, e ver de perto a qualidade de tudo que leva a marca coop." />
  <meta property="og:image"         content="http://127.0.0.1:8000/front/assets/images/avatar-ocb.png" />
    <link rel="stylesheet" href="{{asset('front/assets/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/c5a5e38028.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Vidaloka&display=swap');
    </style>
    <title>Coopera Brasil</title>
</head>
<body>
