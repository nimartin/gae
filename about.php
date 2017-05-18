<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le projet</title>
    <meta name="description" content="Your about page description"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
  </head>
  <body id="top">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--waterfall site-header">
        <div class="mdl-layout__header-row site-logo-row"><span class="mdl-layout__title">
            <div class="site-logo"></div><span class="site-description">Projet Cloud Computing - Nicolas Martin - Yvan Betremieux</span></span></div>
        <div class="mdl-layout__header-row site-navigation-row mdl-layout--large-screen-only">
         
        </div>
      </header>
      <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font"><a class="mdl-navigation__link" href="index.html">Home</a><a class="mdl-navigation__link" href="portfolio.html">Portfolio</a><a class="mdl-navigation__link" href="about.html">About</a><a class="mdl-navigation__link" href="contact.html">Contact</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="site-content">
          <div class="mdl-grid site-max-width">
            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
              <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">About</h1>
              </div>
              <div class="mdl-card__media"><img class="article-image" src="img/about.jpg" border="0" alt="About">
              </div>
              <div class="mdl-grid site-copy">
                <div class="mdl-cell mdl-cell--12-col"><h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Introduction</h3>
<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text no-padding ">
    <p>Le projet consiste à simuler une api similaire à Amazon permettant de commander des livres à l'aide de différents services. herbergés par <b>Google App Engine</b> et <b>Heroku</b>
    </p>
    <p>Le <b>ShoppingService</b> sert en quelque sorte d'entremetteur entre les deux autres services. On appelle donc ce service avec différents paramètres : <i>Clé d'accès, isbn du livre, la quantité</i>.
    </p>
    <p>Le <b>StockService</b> permet de retourner le stock d'un livre grâce à <i>l'isbn</i> fourni par le <b>ShoppingService</b></p>
    <p>Le <b>WholeSealerService</b> va faire les calculs pour modifier le stock en base en fonction de la commande, il va recommander de nouveaux livre si le stock est insuffisant</p>
    <a href="">Liens GitHub GAE</a>
    <a href="https://github.com/nimartin/whole-saler-app">Liens GitHub Heroku</a>
</div>


<h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Google App Engine</h3>
<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text no-padding ">
    <p>
        GAE nous permet d'herbergés du code directement sur leurs serveurs. En plus de cela il nous fourni une base de données appelées datastore. Nos livres et  Clés de connexion seront donc stockés sur ce datastore.
    </p>
    <h4>Shopping Service</h4>
    <p>Le Shopping Service est celui qui gère les relations entre tous les services. Premièrement il vérifie en base si l'account existe, si c'est le cas il appelle <b>getStock()</b> du StockService. Ensuite, il appelle la méthode <b>addStock</b> du WholeSaler Service. Puis il retourne le résultat directement au client. Cependant, la gestion d'erreur est faite <b>404</b> (isbn invalide), <b>401</b> (L'utilisateur doit avoir un compte valide), <b>400</b> (mauvaises utilisation de requêtes) </p>
    <table class="mdl-data-table mdl-js-data-table">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Nom de méthode</th>
        <th class="mdl-data-table__cell--non-numeric">Type de requête</th>
        <th class="mdl-data-table__cell--non-numeric">Paramètres</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">getBook</td>
        <td class="mdl-data-table__cell--non-numeric">GET</td>
        <td class="mdl-data-table__cell--non-numeric">ACCOUNT, ISBN, QUANTITE</td>
      </tr>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">updateStock</td>
        <td class="mdl-data-table__cell--non-numeric">PUT</td>
        <td class="mdl-data-table__cell--non-numeric">isbn, message, corr = account, nouveau stock</td>
      </tr>
    </tbody>
  </table>
  <h4>Stock Service</h4>
    <p>Le Stock Service va vérifié si l'isbn existe dans ce cas là il retourne le stock du livre en question, dans le cas contraire il retourne un erreur 404.</p>
    <table class="mdl-data-table mdl-js-data-table">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Nom de méthode</th>
        <th class="mdl-data-table__cell--non-numeric">Type de requête</th>
        <th class="mdl-data-table__cell--non-numeric">Paramètres</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">getStock</td>
        <td class="mdl-data-table__cell--non-numeric">GET</td>
        <td class="mdl-data-table__cell--non-numeric">CORR, ISBN</td>
      </tr>
    </tbody>
  </table>
</div>

<h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Heroku</h3>
<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text no-padding ">
    <p>
        Heroky nous permet d'herbergés du code directement sur leurs serveurs. Nous aurions pu l'utiliser pour stocker nos données à l'aide de postgre mais nous avons préféré le datastore de GAE.
    </p>
    <h4>WholeSaler Service</h4>
    <p>Le WholeSaler Service va faire les différents calcul pour savoir s'il doit juste diminuer le stock, ou recommander d'autres livres pour pouvoir satistaire la commande du client. Il rajoute toujours 5 livres supplémentaires en plus des livres commandés par le client pour avoir un stock dans la base. Une fois le calcul fait il appelle la methode <b>updateStock</b> de ShoppingService</p>
    <table class="mdl-data-table mdl-js-data-table">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Nom de méthode</th>
        <th class="mdl-data-table__cell--non-numeric">Type de requête</th>
        <th class="mdl-data-table__cell--non-numeric">Paramètres</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">addStock</td>
        <td class="mdl-data-table__cell--non-numeric">GET</td>
        <td class="mdl-data-table__cell--non-numeric">ISBN, CORR, QUANTITE, STOCK</td>
      </tr>
    </tbody>
  </table>
</div>

<h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Guzzle</h3>
<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text no-padding ">
    <p>
        Pour exécuter le guzzle <a href="http://localhost:8000/client.php">http://localhost:8000/client.php</a><br>
        (Parfois il faut actualisé après l'avoir lancé sinon on a une exception : surement pour que les services GAE et Heroku se lancent)
    </p>
    <h4>WholeSaler Service</h4>
    <p>Le WholeSaler Service va faire les différents calcul pour savoir s'il doit juste diminuer le stock, ou recommander d'autres livres pour pouvoir satistaire la commande du client. Il rajoute toujours 5 livres supplémentaires en plus des livres commandés par le client pour avoir un stock dans la base. Une fois le calcul fait il appelle la methode <b>updateStock</b> de ShoppingService</p>
    <table class="mdl-data-table mdl-js-data-table">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Nom de méthode</th>
        <th class="mdl-data-table__cell--non-numeric">Type de requête</th>
        <th class="mdl-data-table__cell--non-numeric">Paramètres</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">addStock</td>
        <td class="mdl-data-table__cell--non-numeric">GET</td>
        <td class="mdl-data-table__cell--non-numeric">ISBN, CORR, QUANTITE, STOCK</td>
      </tr>
    </tbody>
  </table>
</div>




<h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Team</h3>

<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col">
    <div class="demo-card-image mdl-card mdl-shadow--2dp person1">
      <div class="mdl-card__title mdl-card--expand"></div>
      <div class="mdl-card__actions">
        <span class="demo-card-image__filename">Yvan Betremieux</span>
      </div>
    </div>
  </div>

  <div class="mdl-cell mdl-cell--4-col">
    <div class="demo-card-image mdl-card mdl-shadow--2dp person2">
      <div class="mdl-card__title mdl-card--expand"></div>
      <div class="mdl-card__actions">
        <span class="demo-card-image__filename">Nicolas Martin</span>
      </div>
    </div>
  </div>
</div>

</div>
              </div>
            </div>
          </div>
        </div>
        
        <footer class="mdl-mini-footer">
          <div class="footer-container">
            <div class="mdl-logo">&copy; Cloud Computing. Authors: <a href="https://templateflip.com/" target="_blank">Yvan Betremieux - Martin Nicolas</a></div>
            <ul class="mdl-mini-footer__link-list">
              <li><a href="https://github.com/nimartin">Github</a></li>
            </ul>
          </div>
        </footer>
      </main>
      <script src="https://code.getmdl.io/1.3.0/material.min.js" defer></script>
    </div>
  </body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );
</script>