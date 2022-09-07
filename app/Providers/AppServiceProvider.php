<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\Issue;
use App\Models\Release;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use WireElements\Pro\Components\Spotlight\Spotlight;
use WireElements\Pro\Components\Spotlight\SpotlightMode;
use WireElements\Pro\Components\Spotlight\SpotlightQuery;
use WireElements\Pro\Components\Spotlight\SpotlightResult;
use WireElements\Pro\Components\Spotlight\SpotlightScope;
use WireElements\Pro\Components\Spotlight\SpotlightScopeToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSpotlightGroups();
        $this->registerSpotlightModes();
        $this->registerSpotlightRandomTips();
        $this->registerSpotlightTokens();
        $this->registerSpotlightScopes();
        $this->registerSpotlightQueries();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerSpotlightGroups(): void
    {
        Spotlight::registerGroup('pages', 'Pages');
        Spotlight::registerGroup('repositories', 'Repositories');
        Spotlight::registerGroup('releases', 'Releases');
        Spotlight::registerGroup('assets', 'Assets');
        Spotlight::registerGroup('actions', 'Actions');
        Spotlight::registerGroup('issues', 'Issues');
    }

    private function registerSpotlightModes(): void
    {
        Spotlight::registerModes(
            SpotlightMode::make('help', 'Command palette tips and tricks')
                ->setCharacter('?'),
            SpotlightMode::make('search_issues', 'Search issues')
                ->setCharacter('#'),
            SpotlightMode::make('global_commands', 'Global Commands')
                ->setCharacter('>'),
        );
    }

    private function registerSpotlightRandomTips(): void
    {
        Spotlight::registerTips(
            'Be mindful. Be grateful. Be positive. Be true. Be kind.',
            'Pursue what catches your heart, not what catches your eyes.',
            'Do not fear failure but rather fear not trying.',
        );
    }

    private function registerSpotlightTokens(): void
    {
        Spotlight::registerTokens(
            SpotlightScopeToken::make('repository', function (SpotlightScopeToken $token, Repository $repository) {
                $token->setParameters(['id' => $repository->id, 'slug' => $repository->slug]);
                $token->setText($repository->name);
            }),
            SpotlightScopeToken::make('release', function (SpotlightScopeToken $token, Release $release) {
                $token->setParameters(['id' => $release->id]);
                $token->setText($release->tag);
            }),
            SpotlightScopeToken::make('asset', function (SpotlightScopeToken $token, Asset $asset) {
                $token->setParameters(['id' => $asset->id]);
                $token->setText($asset->filename);
            }),
            SpotlightScopeToken::make('docs', function (SpotlightScopeToken $token) {
                $token->setText('Documentation');
            }),
        );
    }


    private function registerSpotlightScopes(): void
    {
        Spotlight::registerScopes(
            SpotlightScope::forRoute('docs', function (SpotlightScope $scope, Request $request) {
                $scope->applyToken('docs');
            }),
            SpotlightScope::forRoute('repositories.show', function (SpotlightScope $scope, Request $request) {
                $scope->applyToken('repository', $request->repository);
            }),
            SpotlightScope::forRoute('releases.show', function (SpotlightScope $scope, Request $request) {
                $scope->applyToken('repository', $request->repository);
                $scope->applyToken('release', $request->release);
            }),
        );
    }

    private function registerSpotlightQueries(): void
    {
        Spotlight::registerQueries(
            SpotlightQuery::asDefault(function ($query) {
                $pages = collect([
                    SpotlightResult::make()
                        ->setTitle('Dashboard')
                        ->setGroup('pages')
                        ->setAction('jump_to', ['path' => route('dashboard')])
                        ->setIcon('home'),
                    SpotlightResult::make()
                        ->setTitle('Repositories')
                        ->setGroup('pages')
                        ->setAction('jump_to', ['path' => route('repositories')])
                        ->setIcon('tag'),
                    SpotlightResult::make()
                        ->setTitle('Profile')
                        ->setGroup('pages')
                        ->setAction('jump_to', ['path' => route('profile.show')])
                        ->setIcon('user'),
                ]
                )->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });

                $repositories = Repository::where('name', 'like', "%{$query}%")
                    ->take(5)
                    ->get()
                    ->map(function (Repository $repository) {
                        return SpotlightResult::make()
                            ->setTitle($repository->name)
                            ->setGroup('repositories')
                            ->setAction('jump_to', ['path' => route('repositories.show', $repository)])
                            ->setTokens(['repository' => $repository])
                            ->setIcon('tag');
                    });

                return collect()->merge($pages)->merge($repositories);
            }),
            SpotlightQuery::forToken('repository', function ($query, SpotlightScopeToken $repositoryToken) {
                $pages = collect([
                    SpotlightResult::make()
                        ->setTitle('Pull Requests')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('arrow-path-rounded-square'),
                    SpotlightResult::make()
                        ->setTitle('Discussions')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('chat-bubble-bottom-center-text'),
                    SpotlightResult::make()
                        ->setTitle('Actions')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('play-circle'),
                    SpotlightResult::make()
                        ->setTitle('Projects')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('clipboard-document-list'),
                    SpotlightResult::make()
                        ->setTitle('Security')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('shield-check'),
                ]
                )->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });

                $releases = Release::where('repository_id', '=', $repositoryToken->getParameter('id'))
                    ->where('tag', 'like', "%{$query}%")
                    ->with('repository')
                    ->get()
                    ->map(function (Release $release) {
                        return SpotlightResult::make()
                            ->setTitle($release->tag)
                            ->setGroup('releases')
                            ->setAction('jump_to', ['path' => route('releases.show', [$release->repository, $release])])
                            ->setTokens(['repository' => $release->repository, 'release' => $release])
                            ->setIcon('tag');
                    });

                $issues = Issue::where('repository_id', '=', $repositoryToken->getParameter('id'))
                    ->where('title', 'like', "%{$query}%")
                    ->take(3)
                    ->get()
                    ->map(function (Issue $issue) {
                        return SpotlightResult::make()
                            ->setTitle($issue->title)
                            ->setGroup('issues')
                            ->setAction('jump_to', ['path' => ''])
                            ->setIcon('ticket');
                    });

                return collect()->merge($releases)->merge($pages)->merge($issues);
            }),
            SpotlightQuery::forToken('release', function ($query, SpotlightScopeToken $releaseToken) {
                $pages = collect([
                    SpotlightResult::make()
                        ->setTitle('View assets')
                        ->setGroup('pages')
                        ->setAction('emit_event', ['name' => 'modal.open', 'data' => ['assets-show', ['releaseId' => $releaseToken->getParameter('id')]]])
                        ->setIcon('paper-clip'),
                ]
                )->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });

                $actions = collect([
                    SpotlightResult::make()
                        ->setTitle('Delete release')
                        ->setGroup('actions')
                        ->setAction('emit_event', ['name' => 'slide-over.open', 'data' => ['dummy-slide-over']])
                        ->setIcon('trash'),
                ]
                )->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });

                return collect()->merge($pages)->merge($actions);
            }),
            SpotlightQuery::forMode('help', function ($query) {
                return collect([
                    SpotlightResult::make()
                        ->setTitle('Search for issues')
                        ->setTypeahead('Search mode')
                        ->setAction('replace_query', ['query' => '#', 'description' => 'Start command'])
                        ->setIcon('tag'),
                    SpotlightResult::make()
                        ->setTitle('Activate command mode')
                        ->setTypeahead('Command mode')
                        ->setAction('replace_query', ['query' => '>', 'description' => 'Start command'])
                        ->setIcon('command-line'),
                ])->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });
            }),
            SpotlightQuery::forMode('global_commands', function ($query) {
                return collect([
                    SpotlightResult::make()
                        ->setTitle('Visit Wire Elements')
                        ->setAction('jump_to', ['path' => 'https://wire-elements.dev'])
                        ->setIcon('link'),
                    SpotlightResult::make()
                        ->setTitle('Visit Livewire')
                        ->setAction('jump_to', ['path' => 'https://laravel-livewire.com'])
                        ->setIcon('link'),
                    SpotlightResult::make()
                        ->setTitle('Visit Laravel')
                        ->setAction('jump_to', ['path' => 'https://laravel.com'])
                        ->setIcon('link'),
                ])->when(! blank($query), function ($collection) use ($query) {
                    return $collection->where(fn (SpotlightResult $result
                    ) => str($result->title())->lower()->contains(str($query)->lower()));
                });
            }),
            SpotlightQuery::forMode('search_issues', function ($query, $repositoryToken = null) {
                return  Issue::where('title', 'like', "%{$query}%")
                    ->when($repositoryToken, fn ($query) => $query->where('repository_id', $repositoryToken->getParameter('id')))
                    ->take(5)
                    ->get()
                    ->map(function (Issue $issue) {
                        return SpotlightResult::make()
                            ->setTitle($issue->title)
                            ->setGroup('issues')
                            ->setAction('jump_to', ['path' => ''])
                            ->setIcon('ticket');
                    });
            }),
        );
    }
}
