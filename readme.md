# Roles & Image Upload


--------

per creare gia la risorsa con la dependency injection: 
`php artisan make:controller CategoryController -r --model=Category`.


--------

ho creato un unico file edit/create, grazie ad un file di $data che passo alla view.

------

# zizaco

una volta installato (vedi documentazione), definisco i ruoli e i permessi (modificare, visualizzare, ecc..) su php my admin, cosi potro dira cosa puo vedere/fare ogni ruolo.

grazie ad `Auth::user()->can('action')`; posso creare degli if nella index per nascondere i tasti di manipolazione categorie agli utenti ospiti.

inoltre andro a scrivere nel costruttore del mio categorycontroller i middleware che precedentemente avevo aggiunto nel kernel.

 ```php
        $this->middleware('permission:modificare');
        $this->middleware('permission:vedere')->except(['index', 'show']);
 ```
il secondo e' importante, serve per l utente ospite, che puo entrare solo in index e show.
