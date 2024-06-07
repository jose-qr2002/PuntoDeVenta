<?php
namespace App\Exceptions;

use Exception;

class NoStockException extends Exception
{
    // La siguiente excepcion se debe lanza en caso de que el stock este en 0
}