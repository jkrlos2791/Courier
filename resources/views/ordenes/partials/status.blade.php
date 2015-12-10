    <span {!! Html::classes(['label label-success', 'label-warning' => $orden->estado == 'En proceso']) !!} >
                    {{ $orden->estado }}
    </span>
