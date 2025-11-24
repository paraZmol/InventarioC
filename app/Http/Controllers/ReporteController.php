<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function imprimirStock()
    {
        // buscamos todos los productos ordenados por nombre
        $productos = Producto::orderBy('nombre', 'asc')->get();
        $fecha = date('d/m/Y H:i');

        // cargamos la vista pdf.stock y le pasamos los datos
        $pdf = Pdf::loadView('pdf.stock', compact('productos', 'fecha'));

        // descargamos o mostramos el archivo
        return $pdf->stream('reporte-stock.pdf');
    }
}
