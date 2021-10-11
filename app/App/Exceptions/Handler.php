<?php

namespace App\Exceptions;

use Throwable;
use Domains\General\Exceptions\GeneralException;
use Illuminate\Auth\Access\AuthorizationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger('You do not have access to do that.');
        }

        if ($exception instanceof AuthorizationException) {
            return redirect()
                ->back()
                ->withFlashDanger('You do not have access to do that.');
        }

        if ($exception instanceof ModelNotFoundException) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger('The requested resource was not found.');
        }

        return parent::render($request, $exception);
    }
}
