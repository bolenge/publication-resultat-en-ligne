<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Support\Facades\DB;

use App\Models\AnneeAccademique;

class DeliberationController extends Controller
{
    public function index(Content $content)
    {
        $list_annee_acads = DB::table('annee_accademiques')->get();

        return $content
            ->title('Délibération')
            ->description('Page de délibération')
            ->row(Dashboard::title())
            ->view('admins.deliberation', [
                'list' => $list_annee_acads
            ]);
    }
}
