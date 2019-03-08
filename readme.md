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
        $this->middleware('permission:modificare')->except(['index', 'show']);
        $this->middleware('permission:vedere');
 ```
il primo e' importante, serve per l utente ospite, che puo entrare solo in index e show. In pratica scrivendo cosi dico che si puo vedere index e show anche se non hai il permesso 'modificare'.

---------

# image upload

innanzitutto nota importante su **upload delle table** tramite migration.

per farle mi basta creare una nuova migrazione in questa forma:

`php artisan make:migration name --table=tablename`

e poi vado li dentro a scriverci le nuove colonne, e infine comando `migrate`.

-----

form con upload bisogna aggiungere questo al form `enctype="multipart/form-data"`

Dove salvo l immagine? lo vedo dal file `filesystems.php`, nei vari disks.
Di solito si salva in public.


per salvare l immagine mi basta usare questa classe e relativi metodi:

`$image = Storage::disk('public')->put('categories_images', $data['image_file']);`

per salvare nel database dico che:
`$data['image'] = $image;`

nb: 'image_file' deriva dal form, 'image' e' la colonaa del db.


La cartella 'categories_images' viene automaticamente salvata dentro a `storage/app`

Per visualizzare l immagine, bisogna creare il collegamento fra public e lo storage: `php artisan storage:link`. Creo un collegamento a storage dentro a public. poi con un asset la raggiungo in questo modo: `{{ asset('storage/' . $categoriy->image) }}`

