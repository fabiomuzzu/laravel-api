Esercizio di oggi: Laravel Boolfolio - Project Technology
nome repo: [laravel-many-to-many]

Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.

Come ieri, rendete momentaneamente la repo laravel-one-to-many una repo di template, quindi create quella nuova, clonatela in locale e quindi riportate la repo di ieri a normale.

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare il model Technology con relativa  migration, seeder ecc (-rcmsR)
- creare la migration per la tabella pivot project_technology
- aggiungere ai model Technology e Project i metodi per definire la relazione many to many
- visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
- permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto

Bonus 1:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.