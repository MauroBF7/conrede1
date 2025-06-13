<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNIPRequest;
use App\Http\Requests\UpdateNIPRequest;
use App\Models\NIP;
use App\Models\Divisa;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Mail\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use PDF;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NIPController extends Controller
{
    //Função de teste de comunicação por ping em ssh
    public function ping($ip)
    {
        $online = false;
        $hostname = null;
        $mac = null;
        $nbtName = null;

        // Tentativa com ping
        $pingResult = exec("ping -c 1 -W 1 " . escapeshellarg($ip), $output, $status);
        if ($status === 0) {
            $online = true;
        }

        // Tentativa com fsockopen
        if (!$online) {
            $connection = @fsockopen($ip, 80, $errno, $errstr, 1);
            if ($connection) {
                $online = true;
                fclose($connection);
            }
        }

        if ($online) {
            $hostname = gethostbyaddr($ip);

            $arpScan = shell_exec("arp -n " . escapeshellarg($ip));
            if (preg_match('/..:..:..:..:..:../', $arpScan, $matches)) {
                $mac = $matches[0];
            }

            $nbtScan = shell_exec("nmblookup -A " . escapeshellarg($ip));
            if (preg_match('/<00>.*?(\w+)/', $nbtScan, $matches)) {
                $nbtName = $matches[1];
            }
        }

        return response()->json([
            'ip' => $ip,
            'online' => $online,
            'mensagem' => $online ? 'Máquina está ligada' : 'Máquina não está respondendo',
            'hostname' => $hostname,
            'mac' => $mac,
            'dominio' => $nbtName,
        ]);
    }


    /**Teste de envio de email por envelope */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ati.prip@usp.br','Informática PRIP'),
            subject: 'Order Shipped',
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('user');
        $nips= NIP::orderBy('id','ASC')->get();
        $divisas= Divisa::all();
        return view('layouts.nip.index',['nips'=>$nips, 'divisas'=>$divisas, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manager');
        $divisas= Divisa::all();
        return view('layouts.nip.create',['divisas'=>$divisas]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        return 'para salvar dados';
    }

    /**
     * Display the specified resource.
     */
    public function show(NIP $nIP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NIP $nip, Divisa $divisas)
    {

        $divisas = Divisa::all();
        return view('layouts.nip.edit', compact('nip', 'divisas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NIP $nip)
    {
        $this->authorize('manager');
        $validated = $request->validate([
            'ip'           => 'required|ipv4',
            'patchpanel'   => 'integer|between:1,12',
            'porta'        => 'integer|between:1,24',
            'psw'          => 'regex:/^[A-Za-z][0-9]{1,2}$/',
            'ponto'        => 'nullable|string|max:255',
            'patrimonio'   => 'nullable|string|max:255',
            'responsa'     => 'nullable|string|max:255',
            'divisas_id'   => 'nullable|exists:divisas,id',
            'secao'        => 'nullable|string|max:255',
        ]);
        $nip->update($validated);
        return redirect()->route('nip.index')->with('success', 'Registro atualizado com sucesso!');
    }

    /*** Função para exportação da lista de IPs como PDF */
    public function exportacao(){
        $this->authorize('manager');
        //$dompdf->setPaper('A4','landscape');
        $nips= NIP::orderBy('id','ASC')->get();
        $divisas= Divisa::all();
        setlocale(LC_ALL,'pt_BR.utf-8','pt_BR','Portuguese_Brazil');
        $pdf = PDF::loadView('layouts.nip.pdf',['nips'=>$nips, 'divisas'=>$divisas]);
        $pdf->render();
        return $pdf->stream('ListaIPs.pdf'); //no navegador
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NIP $nIP)
    {
        //
    }
}
