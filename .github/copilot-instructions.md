Purpose
This file gives concise, actionable instructions for AI coding agents (Copilot-style) working on this Laravel-based ERP repository so they can be productive immediately.

Big picture
- This is a Laravel application (backend + optional frontend assets). Core responsibilities:
  - HTTP layer: `app/Http/Controllers` (controllers orchestrate requests -> models -> views/resources)
  - Data/model layer: `app/Models` (Eloquent models such as `Licence.php`, `AccLedger.php`, `Sponsor.php`, `VisaProfession.php`, etc.)
  - Persistence: `database/migrations` and `database/seeders` — migrations are timestamped (e.g. `2025_11_16_172245_create_acc_ledgers_table.php`).
  - Routes: `routes/web.php` defines web routes.
  - Config: app behavior is controlled via `config/*.php` and `.env` at runtime.
  - Frontend assets: `resources/` + `vite.config.js` + `package.json` if building JS/CSS.

Key files to reference when editing or adding features
- `artisan` — project entry for CLI tasks.
- `composer.json` — PHP dependencies and autoloading.
- `phpunit.xml` and `Pest.php` — test configuration (uses Pest).
- `app/Providers/AppServiceProvider.php` — application bindings and bootstrapping.
- `routes/web.php` — primary route definitions.
- `app/Models/*` — canonical place for data models and relationships.
- `database/migrations/*` — schema changes; follow timestamped migration naming.

Developer workflows (common commands)
- Install PHP deps: `composer install`
- Run migrations: `php artisan migrate` (ensure `.env` DB values set)
- Run tests: `php artisan test` or `vendor\bin\pest` (Windows PowerShell: `vendor\bin\pest` or `php vendor\bin\pest`)
- Serve locally: `php artisan serve` (development)
- Install Node deps / build assets: `npm install` then `npm run dev` or `npm run build` (see `package.json`)

Project-specific conventions & patterns
- Models live in `app/Models` and map 1:1 to tables created by migrations. When adding fields, update both the migration and the model's `$fillable` (or guarded) arrays.
- Controllers follow Laravel conventions: small controller methods that delegate to models or services. Prefer adding helper methods in `app/Models` or a new `app/Services` directory if logic grows.
- Use Eloquent relationships (hasMany, belongsTo). Look at `User.php` and `Company.php` for examples of relationship definitions.
- Migration timestamps are authoritative ordering — name new migrations with current timestamp format used in `database/migrations`.
- Tests use Pest (`Pest.php`) rather than plain PHPUnit style; follow existing tests in `tests/Feature` and `tests/Unit` for structure.

Integration points & external dependencies
- Database: configured via `.env` and `config/database.php`. Most local work uses MySQL/SQLite depending on `.env`.
- Frontend tooling: Vite + `package.json` scripts. When adding JS/CSS assets, register entries in `resources/js` / `resources/css` and update views or `vite.config.js` as needed.
- Queue, mail, cache, etc.: configured in `config/` but currently not heavily customized — check `config/queue.php` and `config/mail.php` before adding service-specific code.

When editing code, follow these practical rules
- Make minimal, focused changes. Update migrations for schema changes and add a new migration rather than editing old ones if the project is shared.
- Keep controllers thin: move non-trivial logic to models or a `Service` class.
- Add or update tests for new behavior; use existing Pest style (describe/it syntax).
- When adding routes, register them in `routes/web.php` and add route names for easier tests and redirect usage.

Concrete examples from this repo
- To add a new column to `licences`:
  1. Create a new migration `php artisan make:migration add_x_to_licences_table`.
  2. Update `app/Models/Licence.php` `$fillable`.
  3. Add any validation in the controller that accepts the field (controllers live in `app/Http/Controllers`).
- To run the test suite on Windows PowerShell:
  - `composer install; php artisan key:generate; php artisan migrate --env=testing; php vendor\bin\pest`

When to ask a human
- Unclear business logic or data model intent (e.g., domain rules for `AccLedger` or `VisaProfession`).
- Changes that modify production database seeds or migrations older than the release process — ask before altering historical migrations.

Quick-reference snippets
- Install deps: `composer install`
- Run migrations: `php artisan migrate`
- Run tests (PowerShell):
  - `composer install`
  - `php artisan key:generate`
  - `php vendor\bin\pest`

Feedback
If anything in this file is unclear or you want more/less detail in specific sections, say what to expand and I'll iterate.
