<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if($this->isHttpException($e))
        {
            switch (intval($e->getStatusCode())) {
                // not found
                case 404:
                    return redirect()->route('home', app()->getLocale());
                    break;
                // internal error
                case 500:
                    return \Response::view('custom.500',array(),500);
                    break;

                default:
                    return $this->renderHttpException($e);
                    break;
            }
        }

        return parent::render($request, $e);
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
