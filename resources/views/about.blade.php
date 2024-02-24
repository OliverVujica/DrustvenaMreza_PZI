@extends('backbutton')
@extends('layout.layout')

@section('content')

<h3 style="color: #00437a; padding-bottom: 14px">O projektu</h3>

<p class="lh-5" style="font-family: Arial, Helvetica, sans-serif">Projekt "SUM mreža" napravljen je unutar kolegija "Programiranje za internet". Cilj projekta je studentima Sveučilišta u Mostaru omogućiti mrežu na kojoj mogu postavljati zanimljive informacije, poput studentskih radionica, najnovijih informacija vezano za pojedinu ustanovu, zanimljiva predavanja koja se održavaju, te sve informacije koje studenti teško mogu javno pronaći.</p> <hr>  
<p class="lh-5" style="font-family: Arial, Helvetica, sans-serif"> Projekt se sastoji od tri vrste korisnika: gost, registrirani korisnik mreže i administrator. Gost može pregledavati objave koje se nalaze na mreži i nema nikakvih drugih mogućnosti. Korisnik ima sve mogućnosti mreže, poput postavljanja objava, komentiranje, praćenje drugih ljudi, sviđanja itd. Administrator ima potpuno kontrolu nad stranicom, poput upravljanja svim objava, korisnicima, to jest mogućnost CRUD operacija nad svim podacima u bazi. </p>

<h3 style="color: #00437a; padding-bottom: 14px; padding-top:30px">Korištene tehnologije</h3>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <div class="col">
      <div class="card">
        <img style="padding: 40px"  src="https://www.php.net/images/logos/php-logo.svg" class="card-img-top" alt="PHP Logo">
        <div class="card-body">
          <h5 class="card-title">PHP</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img style="padding: 20px" width="230px" height="250px" src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" class="card-img-top" alt="Laravel Logo">
        <div class="card-body">
          <h5 class="card-title">Laravel</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img style="padding: 15px" width="230px" height="250px" src="https://www.w3.org/html/logo/downloads/HTML5_Logo.svg" class="card-img-top" alt="HTML Logo">
        <div class="card-body">
          <h5 class="card-title">HTML</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img style="padding: 15px" width="230px" height="240px" src="https://upload.wikimedia.org/wikipedia/commons/6/62/CSS3_logo.svg" class="card-img-top" alt="CSS Logo">
        <div class="card-body">
          <h5 class="card-title">CSS</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img style="padding: 15px" width="230px" height="240px" src="https://cdn.worldvectorlogo.com/logos/javascript-1.svg" class="card-img-top" alt="JS Logo">
        <div class="card-body">
          <h5 class="card-title">JavaScript</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img style="padding: 25px" height="240px" width="230px" src="https://files.brandlogos.net/svg/PjKl3aKXeF/bootstrap-logo-5247297pJQ_brandlogos.net.svg" class="card-img-top" alt="Boostrap Logo">
        <div class="card-body">
          <h5 class="card-title">Bootstrap</h5>
        </div>
      </div>
    </div>
    <div class="col">
        <div class="card">
          <img height="240px" width="230px" src="https://www.logo.wine/a/logo/MySQL/MySQL-Logo.wine.svg" class="card-img-top" alt="MySQL Logo">
          <div class="card-body">
            <h5 class="card-title">MySQL</h5>
          </div>
        </div>
      </div>
  </div>

  <h3 style="color: #00437a; padding-bottom: 14px; padding-top:40px">O nama</h3>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <img width="200px" height="200px" style="padding: 20px" src="https://www.svgrepo.com/show/361181/github.svg" class="card-img-top" alt="Github Logo">
        <div class="card-body">
          <h5 class="card-title">Oliver Vujica</h5>
          <br>
          <p style="font-family: Arial, Helvetica, sans-serif; text-align:center" class="card-text">Izvorni kod i GitHub profil možete pronaći na linku: </p>
            <div style="text-align: center">
                <a href="https://github.com/OliverVujica/DrustvenaMreza_PZI" target="_blank">Klikom ovdje</a>
            </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img width="200px" height="200px" style="padding: 20px" src="https://www.svgrepo.com/show/361181/github.svg" class="card-img-top" alt="Github Logo">
        <div class="card-body">
          <h5 class="card-title">Petar Kožul</h5>
          <br>
          <p style="font-family: Arial, Helvetica, sans-serif; text-align:center" class="card-text">GitHub profil možete pronaći na linku: </p>
            <div style="text-align: center">
                <a href="https://github.com/OliverVujica/DrustvenaMreza_PZI" target="_blank">Klikom ovdje</a>
            </div>
        </div>
      </div>
    </div>
  </div>

<style>
    .card-title {
        text-align: center;
    }
</style>

@endsection