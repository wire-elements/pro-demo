<?php

namespace App;

use App\Models\User;
use WireElements\Pro\Components\Insert\InsertQueryResult;
use WireElements\Pro\Components\Insert\InsertQueryResults;
use WireElements\Pro\Components\Insert\Types\InsertType;

class UserInsert extends InsertType
{
    protected string $delimiter = '@';
    protected string $match = '\w{1,20}$';

    public function search($query): InsertQueryResults
    {
        return InsertQueryResults::make(
            User::query()
                ->where('name', 'like', "%{$query}%")
                ->orderBy('name')
                ->get()
                ->map(function ($user) {
                    return InsertQueryResult::make(
                        id: $user->id,
                        headline: $user->name,
                        subheadline: '@' . str($user->name)->slug('_'),
                        photo: sprintf('https://ui-avatars.com/api/?name=%s', urlencode($user->name)),
                        insert: '@' . str($user->name)->slug('_'),
                    );
                }));
    }
}
