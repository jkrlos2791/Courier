    <span {!! Html::classes(['label label-orden1 absolute', 
          'orden2' => $entrega->estado == 'En ruta', 
        'orden3' => $entrega->estado == 'Entregado']) !!} >
                    {{ $entrega->estado }}
    </span>