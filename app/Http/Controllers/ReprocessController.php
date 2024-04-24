<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ReprocessController extends Controller
{
    public function showForm()
    {
        return view('reprocess.form');
    }

    public function processCommand(Request $request)
    {
        $request->validate([
            'command' => 'required|string',
        ]);

        $allowedCommands = [
            './artisan certificates:decrypt',
            './artisan config:spider-config-load',
            './artisan config:spider-config-view',
            './artisan --customer=',
            './artisan indicators:create-inactive-outputs',
            './artisan perocess:input-file',
            './artisan process:indicators',
            './artisan process:indicators-batch',
            './artisan process:input-file',
            './artisan process:input-files',
            './artisan process:messages',
            './artisan tinker',
            'ls -la',
        ];

        $command = $request->input('command');

        if (in_array($command, $allowedCommands)) {
            // Adicione o comando à fila Redis
            dispatch(function () use ($command) {
                Artisan::queue(explode(' ', $command));
            });

            return redirect('/reprocessamento')->with('success', 'Comando adicionado à fila com sucesso.');
        }

        return back()->with('error', 'Comando não permitido.');
    }
}
