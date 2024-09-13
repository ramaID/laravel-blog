<?php

namespace App\Providers;

use Throwable;
use OpenAI\Client;
use Illuminate\Support\Str;
use Spatie\Ignition\Contracts\HasSolutionsForThrowable;
use Spatie\ErrorSolutions\SolutionProviders\Laravel\OpenAiSolutionProvider as LaravelOpenAiSolutionProvider;
use Spatie\ErrorSolutions\Solutions\OpenAi\OpenAiSolutionProvider as OpenAiOpenAiSolutionProvider;

final class OpenAiSolutionProvider extends LaravelOpenAiSolutionProvider implements HasSolutionsForThrowable
{
    public function canSolve(Throwable $throwable): bool
    {
        if (! class_exists(Client::class)) {
            return false;
        }

        if (config('ignition.open_ai_key') === null) {
            return false;
        }

        return true;
    }

    public function getSolutions(Throwable $throwable): array
    {
        $solutionProvider = new OpenAiOpenAiSolutionProvider(
            openAiKey: config('ignition.open_ai_key'),
            cache: cache()->store(config('cache.default')),
            cacheTtlInSeconds: 60,
            applicationType: 'Laravel ' . Str::before(app()->version(), '.'),
            applicationPath: base_path(),
            openAiModel: config('ignition.open_ai_model', 'gpt-3.5-turbo'),
        );

        return $solutionProvider->getSolutions($throwable);
    }
}
