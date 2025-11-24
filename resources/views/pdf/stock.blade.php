<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Stock</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .header p { margin: 2px; color: #555; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }

        th { background-color: #f2f2f2; font-weight: bold; }

        .rojo { color: red; font-weight: bold; }
        .verde { color: green; }

        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #999; }
    </style>
</head>
<body>

    <div class="header">
        <h1>CONSTRUCTORA DEMO S.A.C.</h1>
        <p>Reporte Oficial de Inventario</p>
        <p>Fecha de emisión: {{ $fecha }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Código / SKU</th>
                <th>Tipo</th>
                <th style="text-align: right;">Stock Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->codigo ?? '-' }}</td>
                    <td>{{ ucfirst($item->tipo) }}</td>

                    <td style="text-align: right;">
                        <span class="{{ $item->stock_actual <= $item->stock_minimo ? 'rojo' : 'verde' }}">
                            {{ $item->stock_actual }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sistema de Inventario - Generado automáticamente
    </div>

</body>
</html>
