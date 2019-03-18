<?php

namespace App;

use App\Exceptions\MinorCanNotBuyAlcoholicBeverageException;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = ['name', 'type'];

    public function buy()
    {
        throw_if(auth()->user()->isMinor(), MinorCanNotBuyAlcoholicBeverageException::class);

        return true;
    }
}
