<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $release->tag }}
    </h2>
    <div class="text-gray-900 text-sm">
        {{ $release->created_at }}
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="flex flex-col lg:col-span-2">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Changelog</th>

                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 prose prose-sm">
<x-markdown>
## [v9.27.0](https://github.com/laravel/framework/compare/v9.26.1...v9.27.0) - 2022-08-30

### Added
- Add getter and setter for connection in the DatabaseBatchRepository class ([#43869](https://github.com/laravel/framework/pull/43869))

### Fixed
- Fix for potential bug with non-backed enums ([#43842](https://github.com/laravel/framework/pull/43842))
- Patch nested array validation rule regression bug ([#43897](https://github.com/laravel/framework/pull/43897))
- Fix registering event listeners with array callback ([#43890](https://github.com/laravel/framework/pull/43890))

### Changed
- Explicitly add column name to SQLite query in `Illuminate/Database/Console/DatabaseInspectionCommand::getSqliteTableSize()` ([#43832](https://github.com/laravel/framework/pull/43832))
- Allow broadcast on demand notifications ([d2b1446](https://github.com/laravel/framework/commit/d2b14466c27a3d62219256cea27088e6ecd9d32f))
- Make Vite::hotFile() public ([#43875](https://github.com/laravel/framework/pull/43875))
- Prompt to create sqlite db when migrating ([#43867](https://github.com/laravel/framework/pull/43867))
- Call prepare() on HttpException responses ([#43895](https://github.com/laravel/framework/pull/43895))
- Make the model:prune command easier to extend ([#43919](https://github.com/laravel/framework/pull/43919))


## [v9.26.1](https://github.com/laravel/framework/compare/v9.26.0...v9.26.1) - 2022-08-23

### Revert
- Revert "[9.x] Add statusText for an assertion message" ([#43831](https://github.com/laravel/framework/pull/43831))

### Fixed
- Fixed `withoutVite` ([#43826](https://github.com/laravel/framework/pull/43826))


## [v9.26.0](https://github.com/laravel/framework/compare/v9.25.1...v9.26.0) - 2022-08-23

### Added
- Adding support for non-backed enums in Models ([#43728](https://github.com/laravel/framework/pull/43728))
- Added vite asset url helpers ([#43702](https://github.com/laravel/framework/pull/43702))
- Added Authentication keyword for SqlServerConnector.php ([#43757](https://github.com/laravel/framework/pull/43757))
- Added support for additional where* methods to route groups ([#43731](https://github.com/laravel/framework/pull/43731))
- Added min_digits and max_digits validation ([#43797](https://github.com/laravel/framework/pull/43797))
- Added closure support to dispatch conditionals in bus ([#43784](https://github.com/laravel/framework/pull/43784))
- Added configurable paths to Vite ([#43620](https://github.com/laravel/framework/pull/43620))

### Fixed
- Fix unique lock release for broadcast events ([#43738](https://github.com/laravel/framework/pull/43738))
- Fix empty collection class serialization ([#43758](https://github.com/laravel/framework/pull/43758))
- Fixes creation of deprecations channel ([#43812](https://github.com/laravel/framework/pull/43812))

### Changed
- Improve display of failures for assertDatabaseHas ([#43736](https://github.com/laravel/framework/pull/43736))
- Always use the write PDO connection to read the just stored pending batch in bus ([#43737](https://github.com/laravel/framework/pull/43737))
- Move unique lock release to method ([#43740](https://github.com/laravel/framework/pull/43740))
- Remove timeoutAt fallback from Job base class ([#43749](https://github.com/laravel/framework/pull/43749))
- Convert closures to arrow functions ([#43778](https://github.com/laravel/framework/pull/43778))
- Use except also in `Illuminate/Routing/Middleware/ValidateSignature::handle()` ([e554d47](https://github.com/laravel/framework/commit/e554d471daab568877c039e955a01cb2f06a2e7b))
- Adjust forever time for cookies ([#43806](https://github.com/laravel/framework/pull/43806))
- Make string padding UTF-8 safe ([f1762ed](https://github.com/laravel/framework/commit/f1762ed1660f2a71189f1a32efe5b410ec428268))


## [v9.25.1](https://github.com/laravel/framework/compare/v9.25.0...v9.25.1) - 2022-08-16

### Fixes
- [Fixed typos](https://github.com/laravel/framework/compare/v9.25.0...v9.25.1)


## [v9.25.0](https://github.com/laravel/framework/compare/v9.24.0...v9.25.0) - 2022-08-16

### Added
- Added whenNotExactly to Stringable ([#43700](https://github.com/laravel/framework/pull/43700))
- Added ability to Model::query()->touch() to mass update timestamps ([#43665](https://github.com/laravel/framework/pull/43665))

### Fixed
- Prevent error in db/model commands when using unsupported columns ([#43635](https://github.com/laravel/framework/pull/43635))
- Fixes ensureDependenciesExist runtime error ([#43626](https://github.com/laravel/framework/pull/43626))
- Null value for auto-cast field caused deprication warning in php 8.1 ([#43706](https://github.com/laravel/framework/pull/43706))
- db:table command properly handle table who doesn't exist ([#43669](https://github.com/laravel/framework/pull/43669))

### Changed
- Handle assoc mode within db commands ([#43636](https://github.com/laravel/framework/pull/43636))
- Allow chunkById on Arrays, as well as Models ([#43666](https://github.com/laravel/framework/pull/43666))
- Allow for int value parameters to whereMonth() and whereDay() ([#43668](https://github.com/laravel/framework/pull/43668))
- Cleaning up old if-else statement ([#43712](https://github.com/laravel/framework/pull/43712))
- Ensure correct 'integrity' value is used for css assets ([#43714](https://github.com/laravel/framework/pull/43714))


## [v9.24.0](https://github.com/laravel/framework/compare/v9.23.0...v9.24.0) - 2022-08-09

### Added
- New db:show, db:table and db:monitor commands ([#43367](https://github.com/laravel/framework/pull/43367))
- Added validation doesnt_end_with rule ([#43518](https://github.com/laravel/framework/pull/43518))
- Added `Illuminate/Database/Eloquent/SoftDeletes::restoreQuietly()` ([#43550](https://github.com/laravel/framework/pull/43550))
- Added mergeUnless to resource ConditionallyLoadsAttributes trait ([#43567](https://github.com/laravel/framework/pull/43567))
- Added `Illuminate/Support/Testing/Fakes/NotificationFake::sentNotifications()` ([#43558](https://github.com/laravel/framework/pull/43558))
- Added `implode` to `Passthru` in `Illuminate/Database/Eloquent/Builder.php` ([#43574](https://github.com/laravel/framework/pull/43574))
- Make Config repository macroable ([#43598](https://github.com/laravel/framework/pull/43598))
- Add whenNull to ConditionallyLoadsAtrribute trait ([#43600](https://github.com/laravel/framework/pull/43600))
- Extract child route model relationship name into a method ([#43597](https://github.com/laravel/framework/pull/43597))

### Revert
- Reverted [Added `whereIn` to  `Illuminate/Routing/RouteRegistrar::allowedAttributes`](https://github.com/laravel/framework/pull/43509) ([#43523](https://github.com/laravel/framework/pull/43523))

### Fixed
- Fix unique locking on broadcast events ([#43516](https://github.com/laravel/framework/pull/43516))
- Fixes the issue of running docs command on windows ([#43566](https://github.com/laravel/framework/pull/43566), [#43585](https://github.com/laravel/framework/pull/43585))
- Fixes output when running db:seed or using --seed in migrate commands ([#43593](https://github.com/laravel/framework/pull/43593))

### Changed
- Gracefully fail when unable to locate expected binary on the system for artisan docs command ([#43521](https://github.com/laravel/framework/pull/43521))
- Improve output for some Artisan commands ([#43547](https://github.com/laravel/framework/pull/43547))
- Alternative database name in Postgres DSN, allow pgbouncer aliased databases to continue working on 9.x ([#43542](https://github.com/laravel/framework/pull/43542))
- Allow @@class() for component tags ([#43140](https://github.com/laravel/framework/pull/43140))
- Attribute Cast Performance Improvements ([#43554](https://github.com/laravel/framework/pull/43554))
- Queue worker daemon should also listen for SIGQUIT ([#43607](https://github.com/laravel/framework/pull/43607))
- Keep original keys when using Collection->sortBy() with an array of sort operations ([#43609](https://github.com/laravel/framework/pull/43609))
</x-markdown>

                                        <div class="my-4">
                                            <h4 class="text-xl font-medium">Leave a comment</h4>
                                            <p>If you want to try the insert component, start typing, and tag someone using the `@` sign, like Example user.</p>

                                            <textarea {{ wep_insert(['user']) }} rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>

                                            <button type="button" wire:click="confirm" class="rounded mt-2 bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Assets</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($this->release->assets as $asset)
                                <tr>
                                    <td class="pl-4 py-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $asset->filename }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
