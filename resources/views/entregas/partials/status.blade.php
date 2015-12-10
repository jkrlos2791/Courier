    <span {!! Html::classes(['label label-default', 
          'label-primary' => $entrega->estado == 'En ruta', 
        'label-success' => $entrega->estado == 'Entregado']) !!} >
                    {{ $entrega->estado }}
    </span>