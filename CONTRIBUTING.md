# Contributing

Contributions are **welcome** and will be fully **credited**.

Pull requests are accepted on [GitHub](https://github.com/mindtwo/laravel-auto-create-uuid).

## Guidelines

- **Code style** &mdash; this package uses [Laravel Pint](https://laravel.com/docs/pint).
  Run `composer format` before committing.
- **Static analysis** &mdash; run `composer analyse` (PHPStan level 8) and make sure
  no errors are reported.
- **Tests** &mdash; new behaviour must be covered by a test in
  [`tests/`](tests/). Run `composer test` to execute the suite locally.
- **Semantic versioning** &mdash; this package follows [SemVer 2.0.0](https://semver.org/).
  Avoid breaking public APIs in minor or patch releases.
- **One pull request per feature** &mdash; do not bundle unrelated changes.
- **Coherent history** &mdash; squash intermediate commits when relevant; each
  commit should leave the repository in a working state.

## Local development

```bash
composer install
composer test
composer analyse
composer format
```

**Happy coding!**
