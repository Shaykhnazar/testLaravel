<?php

namespace App\Exceptions;

use Exception;

class MismatchException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('errors.mismatch');
    }
}
