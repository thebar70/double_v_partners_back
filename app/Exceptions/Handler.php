<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    protected $dontReport = [
        TicketNotFoundException::class,
        NotFoundHttpException::class
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (TicketNotFoundException $e) {
            return response()->json(
                data: [
                    'status' => 'fail',
                    'error' => $e->getMessage()
                ],
                status: 404
            );
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json(
                data: [
                    'status' => 'fail',
                    'error' => $e->getMessage()
                ],
                status: 404
            );
        });
    }

}
