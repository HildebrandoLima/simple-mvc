<?php
	Route::set('index.php', function() {
		Index::CreateView('Index');
	});

	Route::set('Sobre', function() {
		Sobre::CreateView('Sobre');
	});

	Route::set('Contato', function() {
		Contato::CreateView('Contato');
	});
?>