<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $currentPage;

    public function __construct()
    {

    }

    public function parseSlug($string){
        $normalizeChars = array(
            'Ա'=>'A', 'ա'=>'a',
            'Բ'=>'B','բ'=>'b',
            'Գ'=>'G', 'գ'=>'g',
            'Դ'=>'D', 'դ'=>'d',
            'Ե'=>'E', 'ե'=>'e',
            'Զ'=>'Z', 'զ'=>'z',
            'Է'=>'E', 'է'=>'e',
            'Ը'=>'Y', 'ը'=>'y',
            'Թ'=>'T', 'թ'=>'t',
            'Ժ'=>'J', 'ժ'=>'j',
            'Ի'=>'I', 'ի'=>'i',
            'Լ'=>'L', 'լ'=>'l',
            'Խ'=>'Kh', 'խ'=>'kh',
            'Ծ'=>'C', 'ծ'=>'c',
            'Կ'=>'K', 'կ'=>'k',
            'Հ'=>'H', 'հ'=>'h',
            'Ձ'=>'Dz', 'ձ'=>'dz',
            'Ղ'=>'X', 'ղ'=>'x',
            'Ճ'=>'Ch', 'ճ'=>'ch',
            'Մ'=>'M', 'մ'=>'m',
            'Յ'=>'Y', 'յ'=>'y',
            'Ն'=>'N', 'ն'=>'n',
            'Շ'=>'Sh', 'շ'=>'sh',
            'Ո'=>'Vo', 'ո'=>'o',
            'Չ'=>'Ch', 'չ'=>'ch',
            'Պ'=>'P', 'պ'=>'p',
            'Ջ'=>'Dj', 'ջ'=>'dj',
            'Ռ'=>'R', 'ռ'=>'r',
            'Ս'=>'S', 'ս'=>'s',
            'Վ'=>'V', 'վ'=>'v',
            'Տ'=>'T', 'տ'=>'t',
            'Ր'=>'R', 'ր'=>'r',
            'Ց'=>'C', 'ց'=>'c',
            'Ու'=>'U', 'ու'=>'u',
            'Փ'=>'P', 'փ'=>'p',
            'Ք'=>'Q', 'ք'=>'q',
            'և'=>'ev',
            'Օ'=>'O', 'օ'=>'o',
            'Ֆ'=>'F', 'ֆ'=>'f', );
        $value = Str::slug(strtr($string, $normalizeChars));
        return $value === '' ? null : $value;
    }
}
