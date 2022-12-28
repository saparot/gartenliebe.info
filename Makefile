ide-helper:
	@php artisan ide-helper:generate
	@php artisan ide-helper:models
	@php artisan ide-helper:meta

database-migrate:
	@php artisan migrate

dev-database-migrate:
	@php artisan migrate:refresh --seed

db-shell:
	@php artisan tinker
