# suapimpresainungiorno

è uno script per estrarre da impresainungiorno.gov.it/web/matera/comune/pratiche-presentate/t/F052 tutte le pratiche SUAP del Comune di Matera.

Se il tuo Comune è gestito da impresainungiorno allora puoi usare lo scritp:

1) in index.php valorizza $city e $id con i valori che trovi nell'url impresainungiorno.gov.it/web/matera/comune/pratiche-presentate/t/F052 e cioè "matera" e "F052"
2) se vuoi avere sempre un CSV a cui puntare, setta una crontab sul file update.php per esempio ogni mezzanotte. cosi in db/export.csv avrai sempre il file aggiornato

Lic. MIT @piersoft
Il file della Licenza deve essere sempre identico a quello presente in questa repo.
